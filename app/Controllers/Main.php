<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CoinModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

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
}
