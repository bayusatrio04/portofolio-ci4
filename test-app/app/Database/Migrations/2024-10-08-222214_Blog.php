<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Blog extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'blog_id' => [
                'type'           => 'INT',
                'constraint'     => 7,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'blog_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'blog_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('blog_id', true);
        $this->forge->createTable('blog');
    }

    public function down()
    {
        //
        $this->forge->dropTable('blog');
    }
}
