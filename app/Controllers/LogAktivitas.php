<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogAktivitasModel;

class LogAktivitas extends BaseController
{
    public function __construct()
    {
        $this->model = new LogAktivitasModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Log Aktivitas',
            'log'   => $this->model->join('user', 'log_aktivitas.id_user=user.id_user')->orderBy('tanggal_aktivitas', 'DESC')->findAll()
        ];
        return view('manage_account/log_aktivitas/log_aktivitas', $data);
    }
    public function delete($id_log)
    {
        $this->model->delete($id_log);
        return redirect()->to(site_url('log-aktivitas'))->with('success', 'Berhasil Menghapus Log!!');
    }
}
