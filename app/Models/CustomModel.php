<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomModel extends Model
{
    public function JHargaP()
    {
        return $this->db->table('detail_order')
            ->selectSum('harga')
            ->join('menu', 'detail_order.id_menu=menu.id_menu')
            ->join('order', 'order.id_order=detail_order.id_order')
            ->where([
                'status_detail_order' => 'belum_checkout',
                'id_user' => session()->get('id_user')
            ])
            ->get()->getResult();
    }


    public function getPesanan()
    {
        return $this->db->table('detail_order')
            ->join('menu', 'detail_order.id_menu=menu.id_menu')
            ->join('order', 'detail_order.id_order=order.id_order')
            ->groupBy('nama_menu')
            ->where([
                'status_detail_order' => 'belum_checkout',
                'id_user' => session()->get('id_user')
            ])
            ->get()->getResult();
    }
    public function JPesanan($id_menu) //jumlah pesanan
    {
        return $this->db->table('detail_order')
            ->join('order', 'detail_order.id_order=order.id_order')

            ->where([
                'status_detail_order' => 'belum_checkout',
                'id_menu'    => $id_menu,
                'id_user'      => session()->get('id_user')
            ])
            ->countAllResults();
    }



    public function getOrder()
    {
        return $this->db->table('order')
            ->join('user', 'order.id_user=user.id_user')
            ->get()->getResult();
    }
    public function getOrderKasir() //ge Order Kasir
    {
        return $this->db->table('order')
            ->join('user', 'order.id_user=user.id_user')
            ->where([
                'level' => session()->get('level'),
                'order.id_user' => session()->get('id_user')
            ])
            ->get()->getResult();
    }
    public function JMenu($id_order) //jumlah menu
    {
        return $this->db->table('detail_order')
            ->where(['id_order' => $id_order])
            // ->where(['id_menu' => $id_menu])
            ->countAllResults();
    }


    public function getTransaksi()
    {
        return $this->db->table('transaksi')
            ->join('user', 'transaksi.id_user=user.id_user')
            ->join('order', 'transaksi.id_order=order.id_order')
            ->orderBy('tanggal_transaksi', 'DESC')
            ->get()->getResult();
    }
    public function getTransaksiK() //get transaksi berdasarkan transaksi
    {
        return $this->db->table('transaksi')
            ->join('user', 'transaksi.id_user=user.id_user')
            ->join('order', 'transaksi.id_order=order.id_order')
            ->where(['transaksi.id_user' => session()->get('id_user')])
            ->orderBy('tanggal_transaksi', 'DESC')
            ->get()->getResult();
    }
    public function JHargaT()
    { //jumlah harga transaksi berdasarkan keseluruhan
        return $this->db->table('transaksi')
            ->selectSum('total_harga')
            ->join('user', 'transaksi.id_user=user.id_user')
            ->get()->getRow('total_harga');
    }
    public function JHargaTK()
    { //jumlah harga transaksi berdasarkan id_user kasir
        return $this->db->table('transaksi')
            ->selectSum('total_harga')
            ->where(['id_user' => session()->get('id_user')])
            ->get()->getRow('total_harga');
    }

    public function getPesananT($id_order) //get pesanan transaksi
    {
        return $this->db->table('detail_order')
            ->join('menu', 'detail_order.id_menu=menu.id_menu')
            ->groupBy('menu.id_menu')
            ->where([
                'detail_order.id_order' => $id_order,
            ])
            ->get()->getResult();
    }
    public function JPesananT($id_menu, $id_order) //jumlah pesanan transaksi
    {
        return $this->db->table('detail_order')
            ->join('order', 'detail_order.id_order=order.id_order')

            ->where([
                'id_menu'    => $id_menu,
                'order.id_order'    => $id_order,
            ])
            ->countAllResults();
    }
    public function HargaSatuan($id_menu) //harga satuan menu
    {
        return $this->db->table('menu')
            ->where([
                'id_menu'    => $id_menu,
            ])
            ->get()->getRow('harga');
    }

    public function TotalAkun()
    {
        return $this->db->table('user')
            ->countAll();
    }
    public function TotalMenu()
    {
        return $this->db->table('menu')
            ->countAll();
    }
    public function TotalTransaksi()
    {
        return $this->db->table('transaksi')
            ->countAll();
    }
}
