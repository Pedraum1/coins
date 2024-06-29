<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
            'created_at'=>['type'=>'DATETIME'],
            'updated_at'=>['type'=>'DATETIME'],
            'deleted_at'=>['type'=>'DATETIME'],

            'email'=>['type'=>'VARCHAR','constraint'=>'25'],
            'senha'=>['type'=>'VARCHAR','constraint'=>'15'],
            
            'name'=>['type'=>'VARCHAR','constraint'=>'20'],
            'role'=>['type'=>'VARCHAR','constraint'=>'25'],
            'profile'=>['type'=>'VARCHAR','constraint'=>'20'],
            'coins'=>['type'=>'INT','constraint'=>11],
            'access'=>['type'=>'INT','constraint'=>3],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
