<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_order'       => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => TRUE
            ],
            'no_meja'       => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'tanggal_order'       => [
                'type'           => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ],
            'id_user'       => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'keterangan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'status_order'      => [
                'type'           => 'ENUM',
                'constraint'     => ['belum_bayar', 'sudah_bayar'],
            ],
            'updated_at'       => [
                'type'           => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ]
        ]);
        $this->forge->addKey('id_order', TRUE);
        $this->forge->createTable('order');
    }

    public function down()
    {
        $this->forge->dropTable('order');
    }
}
