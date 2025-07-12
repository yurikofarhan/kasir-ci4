<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'order';
    protected $primaryKey       = 'id_order';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'no_meja',
        'tanggal_order',
        'id_user',
        'keterangan',
        'status_order',
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_order';
    protected $updatedField  = 'updated_at';
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
        $data['data']['tanggal_order'] = date('Y-m-d H:i:s');

        return $data;
    }
    protected function beforeUpdate(array $data)
    {
        $data['data']['updated_at'] = date('Y-m-d H:i:s');

        return $data;
    }
    protected function afterInsert(array $data)
    {
        $LogModel = new LogAktivitasModel();

        $newData = [

            'id_user' => session()->get('id_user'),
            'deskripsi' => 'Insert data Order ' . $this->primaryKey . ':' . $data['id'],
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
            'deskripsi' => 'Update data Order ' . $this->primaryKey . ':' . $data['id']['0'],
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
            'deskripsi' => 'Delete data Order ' . $this->primaryKey . ':' . $data['id']['0'],
            'user_agent' => \Config\Services::request()->getUserAgent()->getAgentString()
        ];
        $LogModel->save($newData);
        return $data;
    }
}
