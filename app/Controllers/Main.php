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
        $access = session()->acesso;
        $usuario_nome = session()->nome;
        $model_users = new UserModel();
        $model_coins = new CoinModel();

        $data = [];

        switch($access){
            case 0:
                $coins = $model_coins->where('personal',$usuario_nome)->orderBy('updated_at','DESC')->paginate(10);
                $data['coins'] = $coins;

            break;

            case 1:
                $membros = $model_users->where('access', 0)->orderBy('coins', 'DESC')->paginate(20);
                $data['membros'] = $membros;

                $coins = $model_coins->where('personal',$usuario_nome)->orderBy('updated_at','DESC')->paginate(10);
                $data['coins'] = $coins;

            break;

            case 2:
                $membros = $model_users->where('access <=', 1)->orderBy('coins', 'DESC')->paginate(20);
                $data['membros'] = $membros;

            break;
        }

        return view('dashboard',$data);
    }

    public function coins($id){
        $model = new UserModel();
        $membro = $model->find($id);        

        $model = new CoinModel();
        $coins = $model->where('personal',$membro->name)->orderBy('updated_at','DESC')->findAll();

        $data = [
                 'membro' => $membro,
                 'coins' => $coins,
                ];

        return view('adm/coins', $data);
    }

    public function coinSubmit(){

        #COLETANDO INFORMAÇÕES DO FORMULÁRIO
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
}
