<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'lokasi_banjir'  => $this->lbm->getLokasiBanjir(),
            'title' => 'Cirebon Flood Tracker',
        ];

        return view('home', $data);
    }
}
