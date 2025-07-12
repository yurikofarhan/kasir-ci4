<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use App\Models\OrderModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Order extends BaseController
{
    public function __construct()
    {
        $this->model = new OrderModel();
        $this->MC    = new CustomModel();
    }
    public function index()
    {


        $data = [
            'title'         => 'Riwayat Order',
            'getOrder'      => $this->MC->getOrder(),
            'ModelCustom'   => $this->MC
        ];



        return view('pesanan/order', $data);
    }
    public function delete($id_order)
    {
        if (isset($id_order)) {
            $this->model->delete($id_order);
            return redirect()->to(site_url('order/' . session()->get('level')))->with('success', 'Berhasil Menghapus!');
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }
}
