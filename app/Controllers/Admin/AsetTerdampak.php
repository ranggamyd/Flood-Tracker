<?php

namespace App\Controllers\Admin;

use CodeIgniter\Exceptions\PageNotFoundException;

class AsetTerdampak extends \App\Controllers\BaseController
{
    public function index()
    {
        $data = [
            'aset_terdampak' => $this->atm->getAsetTerdampak(),
            'title' => 'Kelola Aset Terdampak',
        ];

        return view('admin/aset_terdampak/index', $data);
    }

    public function view($id = null)
    {
        $data = [
            'aset_terdampak' => $this->atm->getAsetTerdampak($id),
            'aset_terdampak' => $this->atm->getAsetTerdampakByIdAsetTerdampak($id)
        ];

        if (empty($data['aset_terdampak'])) {
            throw new PageNotFoundException('Cannot find the item: ' . $id);
        }

        $data['title'] = $data['aset_terdampak']['lokasi'];

        return view('admin/aset_terdampak/view', $data);
    }

    public function kelola_aset($id_lokasi_banjir)
    {
        if (!$this->request->is('post')) {
            $data = [
                'lokasi_banjir' => $this->lbm->getLokasiBanjir($id_lokasi_banjir),
                'aset_terdampak' => $this->atm->getAsetTerdampakByIdLokasiBanjir($id_lokasi_banjir),
                'title' => 'Kelola Aset Terdampak'
            ];

            return view('admin/aset_terdampak/kelola_aset', $data);
        }

        $this->atm->where('id_lokasi_banjir', $id_lokasi_banjir);
        $this->atm->delete();

        // Ambil data dari form
        $gambarAset = $this->request->getFiles('gambar_aset')['gambar_aset'];
        $namaAset = $this->request->getPost('nama_aset');
        $kategori = $this->request->getPost('kategori');
        $kondisi = $this->request->getPost('kondisi');
        $deskripsi = $this->request->getPost('deskripsi');

        // Proses penyimpanan data aset ke database 
        $asetModel = $this->atm;;

        // Looping berdasarkan jumlah elemen "nama_aset"
        for ($i = 0; $i < count($namaAset); $i++) {
            // Cek apakah ada file gambar yang diunggah
            if ($gambarAset[$i]->isValid() && !$gambarAset[$i]->hasMoved()) {
                $newName = $gambarAset[$i]->getRandomName();
                $gambarAset[$i]->move(ROOTPATH . 'public/assets/images', $newName);

                // Data yang akan diinsert ke database
                $data = [
                    'gambar_aset' => $newName,
                    'nama_aset' => $namaAset[$i],
                    'kategori' => $kategori[$i],
                    'kondisi' => $kondisi[$i],
                    'deskripsi' => $deskripsi[$i],
                    'id_lokasi_banjir' => $id_lokasi_banjir,
                ];

                // Lakukan operasi insert ke database
                $asetModel->insert($data);
            }
        }

        // // Tampilkan pesan sukses
        session()->setFlashdata('success', 'Berhasil menyimpan data!');
        return redirect()->to(base_url('admin/aset_terdampak'));
    }

    public function delete($id)
    {
        $this->atm->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data!');
        return redirect()->to(base_url('admin/aset_terdampak'));
    }
}
