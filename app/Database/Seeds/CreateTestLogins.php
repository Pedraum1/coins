<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CreateTestLogins extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'created_at'=>Time::now(),          
            'email'=>'pedro@gmail.com',
            'senha'=>'Pedro123',
            'name'=>'Pedro Paulo',
            'role'=>'Diretor de Projetos',
            'profile'=>'pedro1.png',
            'coins'=>'20',
            'access'=>'2',
        ]);
        $this->db->table('users')->insert([
            'created_at'=>Time::now(),
            'email'=>'marcos@gmail.com',
            'senha'=>'Marcos456',
            'name'=>'Marcos Iury',
            'role'=>'Gerente de Projetos',
            'profile'=>'marcos1.png',
            'coins'=>'15',
            'access'=>'1',
        ]);
        $this->db->table('users')->insert([
            'created_at'=>Time::now(),          
            'email'=>'sara@gmail.com',
            'senha'=>'Sara789',
            'name'=>'Sara Andrade',
            'role'=>'Analista de RH',
            'profile'=>'sara1.png',
            'coins'=>'10',
            'access'=>'0',
        ]);
    }
}
