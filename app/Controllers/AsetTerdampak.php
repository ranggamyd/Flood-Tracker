<?php

namespace App\Controllers;

class AsetTerdampak extends BaseController
{
    public function index()
    {
        $data = [
            'aset_terdampak'  => $this->atm->getAsetTerdampak(),
            'title' => 'Aset terdampak akibat bencana banjir',
        ];

        return view('aset_terdampak', $data);
    }
}
