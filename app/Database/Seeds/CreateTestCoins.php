<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CreateTestCoins extends Seeder
{
    public function run()
    {
        $this->db->table('coins')->insert([
            'created_at'=>Time::now(),
            'updated_at'=>Time::now(),         
            'title'=>'Colaborador do Mês',
            'personal'=>'Marcos Iury',
            'description'=>'Reconhecimento por ser o colaborador mais destacado do mês, demonstrando excelente desempenho e dedicação.',
            'coins'=>'100'
        ]);
        
        $this->db->table('coins')->insert([
            'created_at'=>Time::now(),
            'updated_at'=>Time::now(),         
            'title'=>'Projeto Concluído com Sucesso',
            'personal'=>'Marcos Iury',
            'description'=>'Parabéns por concluir o projeto XYZ dentro do prazo e com alta qualidade.',
            'coins'=>'50'
        ]);

        $this->db->table('coins')->insert([
            'created_at'=>Time::now(),
            'updated_at'=>Time::now(),         
            'title'=>'Ideia Inovadora',
            'personal'=>'Marcos Iury',
            'description'=>'Reconhecimento pela proposta de uma ideia inovadora que trouxe melhorias significativas para a equipe.',
            'coins'=>'30'
        ]);

        $this->db->table('coins')->insert([
            'created_at'=>Time::now(),
            'updated_at'=>Time::now(),         
            'title'=>'Excelência no Atendimento ao Cliente',
            'personal'=>'Sara Andrade',
            'description'=>'Agradecimento pelo atendimento excepcional aos clientes, resultando em feedbacks positivos e satisfação.',
            'coins'=>'70'
        ]);

        $this->db->table('coins')->insert([
            'created_at'=>Time::now(),
            'updated_at'=>Time::now(),         
            'title'=>'Trabalho em Equipe',
            'personal'=>'Sara Andrade',
            'description'=>'Reconhecimento pela colaboração e espírito de equipe exemplares durante o projeto ABC.',
            'coins'=>'40'
        ]);

        $this->db->table('coins')->insert([
            'created_at'=>Time::now(),
            'updated_at'=>Time::now(),         
            'title'=>'Meta de Vendas Atingida',
            'personal'=>'Sara Andrade',
            'description'=>'Parabéns por atingir e superar a meta de vendas estabelecida para o trimestre.',
            'coins'=>'60'
        ]);
    }
}
