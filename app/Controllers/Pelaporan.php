<?php

namespace App\Controllers;

class Pelaporan extends BaseController
{
    public function index()
    {
        $id_user = session('id_user');

        $data = [
            'laporan_saya'  => $this->pm->getLaporanSaya($id_user),
            'title' => 'Laporan Saya',
        ];

        return view('laporan_saya', $data);
    }

    public function laporkan_banjir()
    {
        if (!$this->request->is('post')) {
            return view('pelaporan', ['title' => 'Laporkan banjir']);
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
                'rules' => 'uploaded[foto_pelaporan]|is_image[foto_pelaporan]',
                'errors' => [
                    'uploaded' => '{field} Harus diupload',
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
            session()->setFlashdata('error', 'Gagal melaporkan!');
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
            'id_user' => session('id_user'),
            'lokasi'  => $this->request->getVar('lokasi'),
            'deskripsi'  => $this->request->getVar('deskripsi'),
            'foto_pelaporan'  => $fileName,
            'garis_lintang' => $this->request->getVar('garis_lintang'),
            'garis_bujur' => $this->request->getVar('garis_bujur'),
        ]);
        session()->setFlashdata('success', 'Terima kasih atas kontribusi anda, laporan berhasil dikirimkan dan akan segera ditinjak lanjuti oleh pihak terkait!');
        return redirect()->to(base_url('laporan_saya'));
    }

    public function delete($id)
    {
        $this->pm->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus laporan!');
        return redirect()->to(base_url('laporan_saya'));
    }
}
