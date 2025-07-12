<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailOrder extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail_order'          => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => TRUE
            ],
            'id_order'       => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'id_menu'       => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'keterangan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'status_detail_order'      => [
                'type'           => 'ENUM',
                'constraint'     => ['belum_checkout', 'sudah_checkout'],
            ],
            'created_at'       => [
                'type'           => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ],
            'updated_at'       => [
                'type'           => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ]
        ]);
        $this->forge->addKey('id_detail_order', TRUE);
        $this->forge->createTable('detail_order');
    }

    public function down()
    {
        $this->forge->dropTable('detail_order');
    }
}
