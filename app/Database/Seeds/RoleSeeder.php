<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('roles')->insert([
            'role'=>'Gerente de produto'
        ]);
        $this->db->table('roles')->insert([
            'role'=>'Gerente de projetos'
        ]);
        $this->db->table('roles')->insert([
            'role'=>'Gerente de marketing'
        ]);
        $this->db->table('roles')->insert([
            'role'=>'Gerente de pesquisa e desenvolvimento'
        ]);
        $this->db->table('roles')->insert([
            'role'=>'Gerente de RH'
        ]);
        $this->db->table('roles')->insert([
            'role'=>'Analista de projetos'
        ]);
        $this->db->table('roles')->insert([
            'role'=>'Analista de marketing'
        ]);
        $this->db->table('roles')->insert([
            'role'=>'Analista de desenvolvimento individual'
        ]);
        $this->db->table('roles')->insert([
            'role'=>'Analista de finanças'
        ]);
    }
}
