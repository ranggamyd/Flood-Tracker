<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetTerdampakModel extends Model
{
    protected $table = 'aset_terdampak';
    
    protected $allowedFields = ['nama_aset', 'kategori', 'deskripsi', 'id_lokasi_banjir', 'kondisi', 'gambar_aset'];

    public function getAsetTerdampak($id = false)
    {
        if ($id === false) {
            $this->select('*');
            $this->select('aset_terdampak.deskripsi AS desc');
            $this->join('lokasi_banjir', 'lokasi_banjir.id = aset_terdampak.id_lokasi_banjir', 'left');
            $this->orderBy('lokasi_banjir.tanggal', 'desc');
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function getAsetTerdampakByIdLokasiBanjir($id_lokasi_banjir = false)
    {
        if ($id_lokasi_banjir === false) {
            $this->join('lokasi_banjir', 'lokasi_banjir.id = aset_terdampak.id_lokasi_banjir', 'left');
            $this->orderBy('lokasi_banjir.tanggal', 'desc');
            return $this->findAll();
        }

        return $this->where(['id_lokasi_banjir' => $id_lokasi_banjir])->findAll();
    }
}
