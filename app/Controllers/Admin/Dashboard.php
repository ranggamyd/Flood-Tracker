<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'pelaporan'  => $this->pm->getPelaporan(),
            'total_laporan'=>$this->pm->countAllResults(),
            'total_lokasi_banjir'=>$this->lbm->countAllResults(),
            'total_aset_terdampak'=>$this->atm->countAllResults(),
            'total_users'=>$this->um->countAllResults(),
            'title' => 'Dashboard',
        ];

        return view('admin/dashboard', $data);
    }
}
