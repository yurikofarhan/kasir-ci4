<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LogAktivitas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_log_aktivitas' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => TRUE
            ],
            'id_user'       => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'tanggal_aktivitas'       => [
                'type'           => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ],
            'deskripsi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'user_agent'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],

        ]);
        $this->forge->addKey('id_log_aktivitas', TRUE);
        $this->forge->createTable('log_aktivitas');
    }

    public function down()
    {
        $this->forge->dropTable('log_aktivitas');
    }
}
