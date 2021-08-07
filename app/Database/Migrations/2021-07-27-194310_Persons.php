<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Persons extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_person' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'age' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'photo' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id_person', true);
        $this->forge->createTable('persons');
    }

    public function down()
    {
        $this->forge->dropTable('persons');
    }
}
