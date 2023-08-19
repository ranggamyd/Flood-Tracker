<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AsetTerdampakSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Data aset terdampak untuk Lokasi A
            [
                'nama_aset' => 'Rumah A',
                'kategori' => 'Tempat Tinggal',
                'deskripsi' => 'Deskripsi aset terdampak Rumah A',
                'id_lokasi_banjir' => 1,
                'kondisi' => 'Rusak Berat',
            ],
            [
                'nama_aset' => 'Toko A',
                'kategori' => 'Usaha',
                'deskripsi' => 'Deskripsi aset terdampak Toko A',
                'id_lokasi_banjir' => 1,
                'kondisi' => 'Rusak Ringan',
            ],
            // Data aset terdampak untuk Lokasi B
            [
                'nama_aset' => 'Rumah B',
                'kategori' => 'Tempat Tinggal',
                'deskripsi' => 'Deskripsi aset terdampak Rumah B',
                'id_lokasi_banjir' => 2,
                'kondisi' => 'Rusak Berat',
            ],
            [
                'nama_aset' => 'Kantor B',
                'kategori' => 'Kantor',
                'deskripsi' => 'Deskripsi aset terdampak Kantor B',
                'id_lokasi_banjir' => 2,
                'kondisi' => 'Rusak Sedang',
            ],
            // Data aset terdampak untuk Lokasi C
            [
                'nama_aset' => 'Rumah C',
                'kategori' => 'Tempat Tinggal',
                'deskripsi' => 'Deskripsi aset terdampak Rumah C',
                'id_lokasi_banjir' => 3,
                'kondisi' => 'Rusak Berat',
            ],
            [
                'nama_aset' => 'Sekolah C',
                'kategori' => 'Pendidikan',
                'deskripsi' => 'Deskripsi aset terdampak Sekolah C',
                'id_lokasi_banjir' => 3,
                'kondisi' => 'Rusak Sedang',
            ],
            // Data aset terdampak untuk Lokasi D
            [
                'nama_aset' => 'Rumah D',
                'kategori' => 'Tempat Tinggal',
                'deskripsi' => 'Deskripsi aset terdampak Rumah D',
                'id_lokasi_banjir' => 4,
                'kondisi' => 'Rusak Ringan',
            ],
            [
                'nama_aset' => 'Gudang D',
                'kategori' => 'Usaha',
                'deskripsi' => 'Deskripsi aset terdampak Gudang D',
                'id_lokasi_banjir' => 4,
                'kondisi' => 'Rusak Sedang',
            ],
            // Data aset terdampak untuk Lokasi E
            [
                'nama_aset' => 'Rumah E',
                'kategori' => 'Tempat Tinggal',
                'deskripsi' => 'Deskripsi aset terdampak Rumah E',
                'id_lokasi_banjir' => 5,
                'kondisi' => 'Rusak Berat',
            ],
            [
                'nama_aset' => 'Pasar E',
                'kategori' => 'Usaha',
                'deskripsi' => 'Deskripsi aset terdampak Pasar E',
                'id_lokasi_banjir' => 5,
                'kondisi' => 'Rusak Ringan',
            ],
        ];

        $this->db->table('aset_terdampak')->insertBatch($data);
    }
}
