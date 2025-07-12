<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use App\Models\MenuModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->CM = new CustomModel();
        $this->model = new TransaksiModel();
        $this->menuModel = new MenuModel();
    }
    public function index($data1 = null)
    {
        $data = [
            'title'         => 'Riwayat Transaksi',
            'ModelCustom'   => $this->CM,
            'JHargaT'       => $this->CM->JHargaT(),
            'JHargaTK'      => $this->CM->JHargaTK(),
            'validation'    => \Config\Services::validation(),

        ];


        return view('transaksi/transaksi', $data);
    }
    public function invoice($id_transaksi)
    {
        $find =  $this->model->join('user', 'transaksi.id_user=user.id_user')
            ->join('order', 'transaksi.id_order=order.id_order')
            ->find($id_transaksi);

        $data = [
            'title'         => 'Invoice ID: #' . $find->id_transaksi,
            'ModelCustom'   => $this->CM,
            'find'          => $find


        ];


        return view('transaksi/invoice', $data);
    }
    //     public function filterTanggal()
    //     {

    // $data=[];
    //         return $this->index($data);
    //     }
}
