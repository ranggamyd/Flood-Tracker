<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiBanjirModel extends Model
{
    protected $table = 'lokasi_banjir';

    protected $allowedFields = ['tanggal', 'lokasi', 'ketinggian', 'gambar', 'deskripsi', 'garis_lintang', 'garis_bujur'];

    public function getLokasiBanjir($id = false)
    {
        if ($id === false) {
            $this->orderBy('tanggal', 'desc');
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getLokasiBanjirByDateRange($startDate, $endDate)
    {
        $this->where('tanggal >=', date('Y-m-d', strtotime($startDate)));
        $this->where('tanggal <=', date('Y-m-d', strtotime($endDate)));
        $this->orderBy('tanggal', 'desc');
        return $this->findAll();
    }
}
