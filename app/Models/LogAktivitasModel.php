<?php

namespace App\Models;

use CodeIgniter\Model;

class LogAktivitasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'log_aktivitas';
    protected $primaryKey       = 'id_log_aktivitas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',
        'tanggal_aktivitas',
        'deskripsi',
        'user_agent'
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
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    protected function beforeInsert(array $data)
    {
        $data['data']['tanggal_aktivitas'] = date('Y-m-d H:i:s');
        return $data;
    }
}
