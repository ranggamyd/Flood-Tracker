<?php

namespace App\Models;

use CodeIgniter\Model;

class PelaporanModel extends Model
{
    protected $table = 'pelaporan_banjir';

    protected $allowedFields = ['id_user', 'tanggal_pelaporan', 'lokasi', 'garis_lintang', 'garis_bujur', 'foto_pelaporan', 'deskripsi', 'status', 'progress_penanganan'];

    public function getPelaporan($id = false)
    {
        if ($id === false) {
            $this->select('*');
            $this->select('pelaporan_banjir.id AS p_id');
            $this->join('users', 'pelaporan_banjir.id_user = users.id', 'left');
            $this->orderBy('pelaporan_banjir.tanggal_pelaporan', 'desc');
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getLaporanSaya($id_user)
    {
        $this->select('*');
        $this->select('pelaporan_banjir.id AS p_id');
        $this->join('users', 'pelaporan_banjir.id_user = users.id', 'left');
        $this->where('id_user', $id_user);
        $this->orderBy('pelaporan_banjir.tanggal_pelaporan', 'desc');
        return $this->findAll();
    }
}
