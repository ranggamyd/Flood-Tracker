<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LokasiBanjirSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tanggal' => date('Y-m-d H:i:s'),
                'lokasi' => 'Lokasi A, Cirebon',
                'ketinggian' => 250,
                'gambar' => 'default.jpg',
                'deskripsi' => 'Deskripsi lokasi banjir A',
                'garis_lintang' => '-6.701',
                'garis_bujur' => '108.560',
            ],
            [
                'tanggal' => date('Y-m-d H:i:s'),
                'lokasi' => 'Lokasi B, Cirebon',
                'ketinggian' => 180,
                'gambar' => 'default.jpg',
                'deskripsi' => 'Deskripsi lokasi banjir B',
                'garis_lintang' => '-6.705',
                'garis_bujur' => '108.539',
            ],
            [
                'tanggal' => date('Y-m-d H:i:s'),
                'lokasi' => 'Lokasi C, Cirebon',
                'ketinggian' => 320,
                'gambar' => 'default.jpg',
                'deskripsi' => 'Deskripsi lokasi banjir C',
                'garis_lintang' => '-6.718',
                'garis_bujur' => '108.537',
            ],
            [
                'tanggal' => date('Y-m-d H:i:s'),
                'lokasi' => 'Lokasi D, Cirebon',
                'ketinggian' => 210,
                'gambar' => 'default.jpg',
                'deskripsi' => 'Deskripsi lokasi banjir D',
                'garis_lintang' => '-6.727',
                'garis_bujur' => '108.575',
            ],
            [
                'tanggal' => date('Y-m-d H:i:s'),
                'lokasi' => 'Lokasi E, Cirebon',
                'ketinggian' => 290,
                'gambar' => 'default.jpg',
                'deskripsi' => 'Deskripsi lokasi banjir E',
                'garis_lintang' => '-6.732',
                'garis_bujur' => '108.563',
            ],
        ];

        $this->db->table('lokasi_banjir')->insertBatch($data);
    }
}
