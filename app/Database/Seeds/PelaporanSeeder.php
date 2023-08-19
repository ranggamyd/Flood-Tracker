<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PelaporanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user' => 2,
                'tanggal_pelaporan' => date('Y-m-d H:i:s'),
                'lokasi' => 'Lokasi A, Cirebon',
                'deskripsi' => 'Deskripsi pelaporan A',
                'foto_pelaporan' => 'default.jpg',
                'status' => 'Tertunda',
            ],
            [
                'id_user' => 3,
                'tanggal_pelaporan' => date('Y-m-d H:i:s'),
                'lokasi' => 'Lokasi B, Cirebon',
                'deskripsi' => 'Deskripsi pelaporan B',
                'foto_pelaporan' => 'default.jpg',
                'status' => 'Dikonfirmasi',
            ],
            [
                'id_user' => 2,
                'tanggal_pelaporan' => date('Y-m-d H:i:s'),
                'lokasi' => 'Lokasi C, Cirebon',
                'deskripsi' => 'Deskripsi pelaporan C',
                'foto_pelaporan' => 'default.jpg',
                'status' => 'Ditolak',
            ],
            [
                'id_user' => 4,
                'tanggal_pelaporan' => date('Y-m-d H:i:s'),
                'lokasi' => 'Lokasi D, Cirebon',
                'deskripsi' => 'Deskripsi pelaporan D',
                'foto_pelaporan' => 'default.jpg',
                'status' => 'Tertunda',
            ],
            [
                'id_user' => 5,
                'tanggal_pelaporan' => date('Y-m-d H:i:s'),
                'lokasi' => 'Lokasi E, Cirebon',
                'deskripsi' => 'Deskripsi pelaporan E',
                'foto_pelaporan' => 'default.jpg',
                'status' => 'Dikonfirmasi',
            ],
        ];

        $this->db->table('pelaporan_banjir')->insertBatch($data);
    }
}
