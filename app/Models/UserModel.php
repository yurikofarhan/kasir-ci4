<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_user',
        'username',
        'password',
        'image',
        'level'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
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
        $data = $this->passwordHash($data);
        $data['data']['created_at'] = date('Y-m-d H:i:s');

        return $data;
    }
    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }
    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

    protected function afterInsert(array $data)
    {
        $LogModel = new LogAktivitasModel();

        $newData = [

            'id_user' => session()->get('id_user'),
            'deskripsi' => 'Insert data User ' . $this->primaryKey . ':' . $data['id'],
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
            'deskripsi' => 'Update data User ' . $this->primaryKey . ':' . $data['id']['0'],
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
            'deskripsi' => 'Delete data User ' . $this->primaryKey . ':' . $data['id']['0'],
            'user_agent' => \Config\Services::request()->getUserAgent()->getAgentString()
        ];
        $LogModel->save($newData);
        return $data;
    }
}
