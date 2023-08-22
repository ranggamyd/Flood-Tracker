<?php

namespace App\Controllers\Admin;

use CodeIgniter\Exceptions\PageNotFoundException;

class Pelaporan extends \App\Controllers\BaseController
{
    public function index()
    {
        $data = [
            'pelaporan' => $this->pm->getPelaporan(),
            'title' => 'Kelola Pelaporan',
        ];

        return view('admin/pelaporan/index', $data);
    }

    public function kelola_aset($id_lokasi_banjir)
    {
        if (!$this->request->is('post')) {
            $data = [
                'lokasi_banjir' => $this->lbm->getLokasiBanjir($id_lokasi_banjir),
                'pelaporan' => $this->pm->getPelaporanByIdLokasiBanjir($id_lokasi_banjir),
                'title' => 'Kelola Pelaporan'
            ];

            return view('admin/pelaporan/kelola_aset', $data);
        }

        $this->pm->where('id_lokasi_banjir', $id_lokasi_banjir);
        $this->pm->delete();

        $data = [];

        foreach ($this->request->getVar('nama_aset') as $index => $nama) {
            $data[] = [
                'nama_aset' => $nama,
                'kategori' => $this->request->getVar('kategori')[$index],
                'kondisi' => $this->request->getVar('kondisi')[$index],
                'deskripsi' => $this->request->getVar('deskripsi')[$index],
                'id_lokasi_banjir' => $id_lokasi_banjir
            ];
        }

        $this->pm->insertBatch($data);
        session()->setFlashdata('success', 'Berhasil menyimpan data!');
        return redirect()->to(base_url('admin/pelaporan'));
    }

    public function konfirmasi($id)
    {
        $this->pm->save([
            'id' => $id,
            'status' => 'Dikonfirmasi'
        ]);

        $laporan = $this->pm->find($id);

        $toAppend = [
            'tanggal' => $laporan['tanggal_pelaporan'],
            'lokasi' => $laporan['lokasi'],
            'garis_lintang' => $laporan['garis_lintang'],
            'garis_bujur' => $laporan['garis_bujur'],
            'deskripsi' => $laporan['deskripsi'],
            'gambar' => $laporan['foto_pelaporan'],
        ];

        session()->setFlashdata('success', 'Berhasil mengonfirmasi laporan! Silahkan lengkapi informasi berikut sesuai dengan kondisi sebenarnya.');
        $queryString = http_build_query($toAppend);
        return redirect()->to(base_url('admin/lokasi_banjir/create?' . $queryString));
    }

    public function tolak($id)
    {
        $this->pm->save([
            'id' => $id,
            'status' => 'Ditolak'
        ]);
        session()->setFlashdata('success', 'Berhasil menolak laporan!');
        return redirect()->to(base_url('admin/pelaporan'));
    }

    public function update($id)
    {
        if (!$this->request->is('put')) {
            $data = [
                'pelaporan' => $this->pm->getPelaporan($id),
            ];

            if (empty($data['pelaporan'])) {
                throw new PageNotFoundException('Cannot find the item: ' . $id);
            }

            $data['title'] = 'Edit Data';

            return view('admin/pelaporan/update', $data);
        }

        if (!$this->validate([
            'lokasi' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => 'Panjang {field} maksimal 255 Karakter',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'foto_pelaporan' => [
                'rules' => 'is_image[foto_pelaporan]',
                'errors' => [
                    'is_image' => '{field} Harus berupa gambar',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
                ],
            'progress_penanganan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ]
        ])) {
            session()->setFlashdata('error', 'Gagal mengubah data!');
            session()->setFlashdata('errorList', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $foto_pelaporan = $this->request->getFile('foto_pelaporan');
        if ($foto_pelaporan->getError() == 4) {
            $fileName = 'default.jpg';
        } else {
            $fileName = $foto_pelaporan->getRandomName();
            $foto_pelaporan->move('assets/images', $fileName);
        }

        $this->pm->save([
            'id' => $id,
            // 'id_user' => session('id_user'),
            'lokasi'  => $this->request->getVar('lokasi'),
            'deskripsi'  => $this->request->getVar('deskripsi'),
            'foto_pelaporan'  => $fileName,
            'progress_penanganan'  => $this->request->getVar('progress_penanganan'),
            'status'  => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('success', 'Berhasil menyimpan data!');
        return redirect()->to(base_url('admin/pelaporan'));
    }

    public function delete($id)
    {
        $p = $this->pm->find($id);
        if ($p['foto_pelaporan'] != 'default.jpg') {
            unlink('assets/images/' . $p['foto_pelaporan']);
        }

        $this->pm->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data!');
        return redirect()->to(base_url('admin/pelaporan'));
    }
}
