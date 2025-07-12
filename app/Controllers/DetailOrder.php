<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use App\Models\DOrderModel;
use App\Models\OrderModel;
use App\Models\TransaksiModel;
use CodeIgniter\I18n\Time;

class DetailOrder extends BaseController
{
    public function __construct()
    {
        $this->model = new DOrderModel();
        $this->model2 = new TransaksiModel();
        $this->model3 = new OrderModel();
        $this->mc   = new CustomModel();
    }
    public function index()
    {
        $getPesanan = $this->mc->getPesanan();
        $data = [
            'title' => 'Checkout Pesanan',
            'getPesanan' => $getPesanan,
            'ModelCustom' => $this->mc,
            'validation' => \Config\Services::validation()

        ];
        return view('pesanan/detail_order', $data);
    }
    public function delete($id_menu)
    {

        $findDO = $this->model->join('order', 'detail_order.id_order=order.id_order')->where([
            'id_menu' => $id_menu,
            'id_user'  => session()->get('id_user'),
            'status_detail_order' => 'belum_checkout'
        ])->findAll($this->request->getPost('jumlah'));

        foreach ($findDO as $value) {

            $this->model->delete($value['id_detail_order']);
        }

        return redirect()->to('pesanan')->with('success', 'Berhasil Menghapus');
    }
    public function checkout()
    {
        foreach ($this->mc->JHargaP() as $harga) {
        }
        if ($this->request->getVar('uang') >= $harga->harga) {
            $validation = [
                'no_meja' => [
                    'rules' => 'required|max_length[2]',
                    'errors' => [
                        'required' => 'Nomor Meja Harus diisi!',
                        'max_length' => 'Nomor Meja Maksimal 2 Karakter!',
                    ]
                ],
            ];
            if (!$this->validate($validation)) {
                $data['validation'] = $this->validator;
                return redirect()->back()->withInput()->with('errorModal', "$('#checkout').modal('show')");
            } else {
                $kembali = $this->request->getVar('uang') - $harga->harga;
                $order = $this->model3->where([
                    'status_order' => 'belum_bayar',
                    'id_user' => session()->get('id_user')
                ])->first();
                $inputTransaksi = [
                    'id_user' => session()->get('id_user'),
                    'id_order' => $order['id_order'],
                    'tanggal_transaksi' => Time::now(),
                    'total_harga' => $harga->harga,
                    'uang' => $this->request->getVar('uang'),
                    'kembali' => $kembali
                ];
                $transaksi = $this->model2->save($inputTransaksi);
                if ($transaksi) {
                    $detail_order = $this->model->where([
                        'status_detail_order' => 'belum_checkout',
                        'id_order' => $order['id_order'],

                    ])->findAll();
                    foreach ($detail_order as  $value) {
                        $updateDO = [
                            'id_detail_order' => $value['id_detail_order'],
                            'status_detail_order' => 'sudah_checkout'
                        ];
                        $this->model->save($updateDO);
                    }

                    $updateOrder = [
                        'id_order' => $order['id_order'],
                        'status_order' => 'sudah_bayar',
                        'no_meja'       => $this->request->getVar('no_meja')
                    ];
                    $this->model3->save($updateOrder);
                    return redirect()->to('transaksi')->with('success', 'Berhasil Bayar');
                } else {
                    return redirect()->back()->with('error', 'Transaksi Gagal!...');
                }
            }
        } else {
            return redirect()->back()->with('error', 'Uang Harus Sama atau Lebih besar dari Total Harga!');
        }
    }
}
