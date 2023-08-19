<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateTables extends Migration
{
    public function up()
    {
        // Table: aset_terdampak
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_aset' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'id_lokasi_banjir' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'kondisi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'gambar_aset' => [
                'type' => 'TEXT',
                'default' => 'default.jpg'
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('aset_terdampak', true);

        // Table: lokasi_banjir
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ketinggian' => [
                'type' => 'FLOAT',
            ],
            'gambar' => [
                'type' => 'TEXT',
                'default' => 'default.jpg'
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'garis_lintang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'garis_bujur' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('lokasi_banjir', true);

        // Table: pelaporan_banjir
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tanggal_pelaporan' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'garis_lintang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'garis_bujur' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'foto_pelaporan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'default.jpg'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Tertunda', 'Dikonfirmasi', 'Ditolak'],
                'default' => 'Tertunda',
            ],
            'progress_penanganan' => [
                'type' => 'FLOAT',
                'default' => 0,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('pelaporan_banjir', true);

        // Table: users
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'jk' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
                'null' => true,
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'is_admin' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('email');
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('aset_terdampak', true);
        $this->forge->dropTable('lokasi_banjir', true);
        $this->forge->dropTable('pelaporan_banjir', true);
        $this->forge->dropTable('users', true);
    }
}
