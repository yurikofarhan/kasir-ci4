<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi'       => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => TRUE
            ],
            'id_user'       => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'id_order'       => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'tanggal_transaksi'       => [
                'type'           => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ],
            'total_harga'       => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2'
            ],
            'uang'       => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2'
            ],
            'kembali'       => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2'
            ],
        ]);
        $this->forge->addKey('id_transaksi', TRUE);
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
