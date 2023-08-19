<?php

namespace App\Controllers;

class Cuaca extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Informasi cuaca di sekitar wilayah Cirebon',
        ];

        return view('cuaca', $data);
    }
}
