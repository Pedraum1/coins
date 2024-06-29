<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCoinsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
            'created_at'=>['type'=>'DATETIME'],
            'updated_at'=>['type'=>'DATETIME'],
            'deleted_at'=>['type'=>'DATETIME'],
            
            'title'=>['type'=>'VARCHAR','constraint'=>'50'],
            'personal'=>['type'=>'VARCHAR','constraint'=>'20'],
            'description'=>['type'=>'TEXT'],
            'coins'=>['type'=>'INT','constraint'=>11],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('coins');
    }

    public function down()
    {
        $this->forge->dropTable('coins');
    }
}
