<?php

namespace App\Controllers\Admin;

use CodeIgniter\Exceptions\PageNotFoundException;

class LokasiBanjir extends \App\Controllers\BaseController
{
    public function index()
    {
        $data = [
            'lokasi_banjir' => $this->lbm->getLokasiBanjir(),
            'title' => 'Kelola Data Lokasi Banjir',
        ];

        return view('admin/lokasi_banjir/index', $data);
    }

    public function view($id = null)
    {
        $data = [
            'lokasi_banjir' => $this->lbm->getLokasiBanjir($id),
            'aset_terdampak' => $this->atm->getAsetTerdampakByIdLokasiBanjir($id)
        ];

        if (empty($data['lokasi_banjir'])) {
            throw new PageNotFoundException('Cannot find the item: ' . $id);
        }

        $data['title'] = $data['lokasi_banjir']['lokasi'];

        return view('admin/lokasi_banjir/view', $data);
    }

    public function create()
    {
        if (!$this->request->is('post')) {
            $data['title'] = 'Tambah Data';
            if ($this->request->getGet()) {
                $data['append'] = [
                    'tanggal' => $this->request->getGet('tanggal'),
                    'lokasi' => $this->request->getGet('lokasi'),
                    'garis_lintang' => $this->request->getGet('garis_lintang'),
                    'garis_bujur' => $this->request->getGet('garis_bujur'),
                    'deskripsi' => $this->request->getGet('deskripsi'),
                    'gambar' => $this->request->getGet('gambar'),
                ];
            }
            return view('admin/lokasi_banjir/create', $data);
        }

        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'lokasi' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => 'Panjang {field} maksimal 255 Karakter',
                ]
            ],
            'ketinggian' => [
                'rules' => 'required|decimal|greater_than[0]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'decimal' => '{field} Harus berupa angka',
                    'greater_than' => '{field} Harus lebih dari 0',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'gambar' => [
                'rules' => 'is_image[gambar]',
                'errors' => [
                    'is_image' => '{field} Harus berupa gambar',
                ]
            ],
            'garis_lintang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'garis_bujur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {
            $fileName = 'default.jpg';
        } else {
            $fileName = $gambar->getRandomName();
            $gambar->move('assets/images', $fileName);
        }

        $this->lbm->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'ketinggian' => $this->request->getVar('ketinggian'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'gambar' => $this->request->getVar('old_gambar') ? $this->request->getVar('old_gambar') : $fileName,
            'garis_lintang' => $this->request->getVar('garis_lintang'),
            'garis_bujur' => $this->request->getVar('garis_bujur'),
        ]);
        session()->setFlashdata('success', 'Berhasil menyimpan data!');
        return redirect()->to(base_url('admin/lokasi_banjir'));
    }

    public function update($id)
    {
        if (!$this->request->is('put')) {
            $data = [
                'lokasi_banjir' => $this->lbm->getLokasiBanjir($id),
                'aset_terdampak' => $this->atm->getAsetTerdampakByIdLokasiBanjir($id)
            ];

            if (empty($data['lokasi_banjir'])) {
                throw new PageNotFoundException('Cannot find the item: ' . $id);
            }

            $data['title'] = 'Edit Data';

            return view('admin/lokasi_banjir/update', $data);
        }

        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'lokasi' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => 'Panjang {field} maksimal 255 Karakter',
                ]
            ],
            'ketinggian' => [
                'rules' => 'required|decimal|greater_than[0]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'decimal' => '{field} Harus berupa angka',
                    'greater_than' => '{field} Harus lebih dari 0',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'gambar' => [
                'rules' => 'is_image[gambar]',
                'errors' => [
                    'is_image' => '{field} Harus berupa gambar',
                ]
            ],
            'garis_lintang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'garis_bujur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {
            $fileName = 'default.jpg';
        } else {
            $fileName = $gambar->getRandomName();
            $gambar->move('assets/images', $fileName);
        }

        $this->lbm->save([
            'id' => $id,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'ketinggian' => $this->request->getVar('ketinggian'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'gambar' => $fileName,
            'garis_lintang' => $this->request->getVar('garis_lintang'),
            'garis_bujur' => $this->request->getVar('garis_bujur'),
        ]);
        session()->setFlashdata('success', 'Berhasil menyimpan data!');
        return redirect()->to(base_url('admin/lokasi_banjir'));
    }

    public function delete($id)
    {
        $lb = $this->lbm->find($id);
        if ($lb['gambar'] != 'default.jpg') {
            unlink('assets/images/' . $lb['gambar']);
        }

        $this->lbm->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data!');
        return redirect()->to(base_url('admin/lokasi_banjir'));
    }
}
