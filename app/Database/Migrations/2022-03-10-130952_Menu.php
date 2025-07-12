<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_menu'          => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => TRUE
            ],
            'nama_menu'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '35'
            ],
            'harga'       => [
                'type'           => 'DECIMAL',
                'constraint'     => '10.2'
            ],
            'status_menu'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'tipe_menu'       => [
                'type'           => 'ENUM',
                'constraint'     => ['makanan', 'minuman']
                // 'default'        => 'pending',
            ],
            'image'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
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
        $this->forge->addKey('id_menu', TRUE);
        $this->forge->createTable('menu');
    }

    public function down()
    {
        $this->forge->dropTable('menu');
    }
}
