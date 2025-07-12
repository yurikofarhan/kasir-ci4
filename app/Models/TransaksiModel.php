<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',
        'id_order',
        'tanggal_transaksi',
        'total_harga',
        'uang',
        'kembali'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_transaksi';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['beforeInsert'];
    protected $afterInsert    = ['afterInsert'];
    protected $beforeUpdate   = ['beforeUpdate'];
    protected $afterUpdate    = ['afterUpdate'];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    protected $afterDelete    = ['afterDelete'];

    protected function beforeInsert(array $data)
    {
        $data['data']['tanggal_transaksi'] = date('Y-m-d H:i:s');

        return $data;
    }
    protected function afterInsert(array $data)
    {
        $LogModel = new LogAktivitasModel();

        $newData = [

            'id_user' => session()->get('id_user'),
            'deskripsi' => 'Insert data Transaksi ' . $this->primaryKey . ':' . $data['id'],
            'user_agent' => \Config\Services::request()->getUserAgent()->getAgentString()
        ];
        $LogModel->save($newData);
        return $data;
    }
    protected function afterUpdate(array $data)
    {
        $LogModel = new LogAktivitasModel();
        // dd($data);
        $newData = [
            'id_user' => session()->get('id_user'),
            'deskripsi' => 'Update data Transaksi ' . $this->primaryKey . ':' . $data['id']['0'],
            'user_agent' => \Config\Services::request()->getUserAgent()->getAgentString()
        ];
        $LogModel->save($newData);
        return $data;
    }
    protected function afterDelete(array $data)
    {
        $LogModel = new LogAktivitasModel();
        $newData = [
            'id_user' => session()->get('id_user'),
            'deskripsi' => 'Delete data Transaksi ' . $this->primaryKey . ':' . $data['id']['0'],
            'user_agent' => \Config\Services::request()->getUserAgent()->getAgentString()
        ];
        $LogModel->save($newData);
        return $data;
    }
}
