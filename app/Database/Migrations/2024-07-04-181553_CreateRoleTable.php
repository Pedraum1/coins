<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoleTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
            
            'role'=>['type'=>'VARCHAR','constraint'=>'40'],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('roles');
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
