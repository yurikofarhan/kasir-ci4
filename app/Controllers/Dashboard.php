<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->ModelCustom = new CustomModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'totalAkun' => $this->ModelCustom->TotalAkun(),
            'totalMenu' => $this->ModelCustom->TotalMenu(),
            'totalTransaksi' => $this->ModelCustom->TotalTransaksi(),
        ];
        return view('dashboard', $data);
    }
}
