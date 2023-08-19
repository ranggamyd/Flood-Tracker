<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class LokasiBanjir extends BaseController
{
    public function index()
    {
        $dateRange = $this->request->getGet('daterange');
        if ($dateRange) {
            list($startDate, $endDate) = explode(' - ', $dateRange);
            $lokasi_banjir = $this->lbm->getLokasiBanjirByDateRange($startDate, $endDate);
        } else {
            $lokasi_banjir = $this->lbm->getLokasiBanjir();
        }

        $data = [
            'lokasi_banjir'  => $lokasi_banjir,
            'title' => 'Peta Lokasi Banjir',
        ];

        return view('lokasi_banjir/index', $data);
    }

    public function view($id = null)
    {
        $data = [
            'lokasi_banjirs' => $this->lbm->getLokasiBanjir(),
            'lokasi_banjir' => $this->lbm->getLokasiBanjir($id),
            'aset_terdampak' => $this->atm->getAsetTerdampakByIdLokasiBanjir($id)
        ];

        if (empty($data['lokasi_banjir'])) {
            throw new PageNotFoundException('Cannot find the item: ' . $id);
        }

        $data['title'] = $data['lokasi_banjir']['lokasi'];

        return view('lokasi_banjir/view', $data);
    }
}
