<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // User Admin
            [
                'nama_lengkap' => 'Administrator',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'alamat' => '',
                'jk' => 'Laki-laki',
                'no_hp' => '',
                'is_admin' => 1,
            ],
            // User Biasa
            [
                'nama_lengkap' => 'User A',
                'email' => 'userA@example.com',
                'username' => 'userA',
                'password' => password_hash('userA', PASSWORD_DEFAULT),
                'alamat' => 'Alamat User A',
                'jk' => 'Laki-laki',
                'no_hp' => '0812345678',
                'is_admin' => 0,
            ],
            [
                'nama_lengkap' => 'User B',
                'email' => 'userB@example.com',
                'username' => 'userB',
                'password' => password_hash('userB', PASSWORD_DEFAULT),
                'alamat' => 'Alamat User B',
                'jk' => 'Perempuan',
                'no_hp' => '0812345679',
                'is_admin' => 0,
            ],
            [
                'nama_lengkap' => 'User C',
                'email' => 'userC@example.com',
                'username' => 'userC',
                'password' => password_hash('userC', PASSWORD_DEFAULT),
                'alamat' => 'Alamat User C',
                'jk' => 'Laki-laki',
                'no_hp' => '0812345680',
                'is_admin' => 0,
            ],
            [
                'nama_lengkap' => 'User D',
                'email' => 'userD@example.com',
                'username' => 'userD',
                'password' => password_hash('userD', PASSWORD_DEFAULT),
                'alamat' => 'Alamat User D',
                'jk' => 'Perempuan',
                'no_hp' => '0812345681',
                'is_admin' => 0,
            ],
            [
                'nama_lengkap' => 'User E',
                'email' => 'userE@example.com',
                'username' => 'userE',
                'password' => password_hash('userE', PASSWORD_DEFAULT),
                'alamat' => 'Alamat User E',
                'jk' => 'Laki-laki',
                'no_hp' => '0812345682',
                'is_admin' => 0,
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
