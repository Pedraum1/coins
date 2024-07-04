<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CoinModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class Main extends BaseController
{
    public function index()
    {
        #INFORMAÇÕES DO USUÁRIO
        $access = session()->acesso;
        $usuario_nome = session()->nome;

        #MODELS
        $model_users = new UserModel();
        $model_coins = new CoinModel();

        $data = [];

        switch($access){
            case 0://ACESSO MEMBRO
                $coins = $model_coins->where('personal',$usuario_nome)->orderBy('updated_at','DESC')->paginate(10);
                $data['coins'] = $coins;

            break;

            case 1://ACESSO GERENTE
                $membros = $model_users->where('access', 0)->orderBy('coins', 'DESC')->paginate(20);
                $data['membros'] = $membros;

                $coins = $model_coins->where('personal',$usuario_nome)->orderBy('updated_at','DESC')->paginate(10);
                $data['coins'] = $coins;

            break;

            case 2://ACESSO DIRETOR
                $membros = $model_users->where('access <=', 1)->orderBy('coins', 'DESC')->paginate(20);
                $data['membros'] = $membros;

            break;
        }

        return view('dashboard',$data);
    }

    public function coins($id){

        #MODELS
        $user_model = new UserModel();
        $coin_model = new CoinModel();

        #MEMBRO
        $membro = $user_model->find($id);

        #ENCONTRANDO COINS DO MEMBRO
        $coins = $coin_model->where('personal',$membro->name)->orderBy('created_at','DESC')->findAll();

        $data = [
                 'membro' => $membro,
                 'coins' => $coins,
                ];

        return view('adm/coins', $data);
    }

    public function coinSubmit(){

        #INFORMAÇÕES DO FORMULÁRIO
        $coinsInput = $this->request->getPost('coinInput');
        $description = $this->request->getPost('descriptionInput');
        $title = $this->request->getPost('titleInput');
        $id = $this->request->getPost('idInput');

        #MODELS
        $coin_model = new CoinModel();
        $user_model = new UserModel();

        $personal = $user_model->find($id);//ENCONTRANDO MEMBRO
        $coins = $coinsInput + $personal->coins;//TOTAL DE COINS DO MEMBRO

        $new_coins = [
                    'created_at'=>Time::now(),
                    'updated_at'=>Time::now(),
                    'title'=>$title,
                    'personal'=>$personal->name,
                    'description'=>$description,
                    'coins'=>$coinsInput
                    ];

        $coins_update = ['coins' => $coins];

        #INSERÇÃO NA BASE DE DADOS
        $coin_model->insert($new_coins);
        $user_model->update($id, $coins_update);
        
        #RETORNANDO PARA O DASHBOARD
        return redirect()->to('/dashboard');
    }

    public function update($id_membro,$id_coin){
        $coin_model = new CoinModel();
        $user_model = new UserModel();
        $membro = $user_model->find($id_membro);
        $coin = $coin_model->find($id_coin);

        $data = ['membro' => $membro, 'coin'=>$coin];

        return view('adm/coins_update',$data);
    }

    public function updateSubmit(){

        #MODELS
        $coin_model = new CoinModel();
        $user_model = new UserModel();

        #INPUTS DO FORMULÁRIO
        $coinId = $this->request->getPost('coinIdInput');
        $personalId = $this->request->getPost('personalIdInput');
        $coinsInput = $this->request->getPost('coinInput');
        $title = $this->request->getPost('titleInput');
        $description = $this->request->getPost('descriptionInput');
        
        #ENCONTRANDO COIN PRÉ-ATUALIZAÇÃO/ORIGINAL
        $original_coin = $coin_model->find($coinId);

        if($original_coin->coins != $coinsInput){//CASO O VALOR DE COINS SEJA DIFERENTE

            $data = [//DADOS DA COIN
                'coins' => $coinsInput,
                'title' => $title,
                'description' => $description,
                'updated_at' => Time::now()
            ];   

            $coins = $coinsInput - $original_coin->coins;//DIFERENÇA EM RELAÇÃO AO ORIGINAL

            $personal = $user_model->find($personalId);//ENCONTRANDO MEMBRO
            $coins = $coins + $personal->coins;//TOTAL DE COINS DO MEMBRO
            $coins_update = ['coins' => $coins];
            $user_model->update($personalId, $coins_update);//ATUALIZANDO COINS DO MEMBRO

        } else {

            $data = [
            'title' => $title,
            'description' => $description,
            'updated_at' => Time::now()
        ];
        }        

        $coin_model->update($coinId, $data);//ATUALIZANDO COIN

        return redirect()->to('/dashboard');
    }

    public function delete($id_coin,$id_user){
        #MODELS
        $coin_model = new CoinModel();
        $user_model = new UserModel();
        #COIN E USUÁRIO
        $coin = $coin_model->find($id_coin);
        $user = $user_model->find($id_user);

        $data = ['coins'=> $user->coins - $coin->coins];

        #ATUALIZANDO BASE DE DADOS
        $coin_model->delete($id_coin);//DELETANDO COIN
        $user_model->update($id_user,$data);//REDUZINDO COINS DO MEMBRO

        return redirect()->back();
    }
}
