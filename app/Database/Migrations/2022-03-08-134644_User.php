<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'          => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => TRUE,
            ],
            'nama_user'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '35',
            ],
            'username'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',
            ],
            'password'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'image'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'level'       => [
                'type'           => 'ENUM',
                'constraint'     => ['admin', 'manajer', 'kasir'],
                // 'default'        => 'pending',
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
        $this->forge->addKey('id_user', TRUE);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
