<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()//TELA DE LOGIN
    {
        $data['erro'] = session()->getFlashdata('erro');
        #VERIFICANDO SE HÁ ERROS DE LOGIN PRÉVIOS

        return view('auth/auth_page.php', $data);
        #RETORNANDO VIEW DE LOGIN
    }

    public function submit(){//VALIDAÇÃO DE LOGIN

        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        #COLETANDO INFORMAÇÕES DO FORM DE LOGIN
        
        $user_model = new UserModel();
        #MODEL DE USUÁRIOS

        $usuario = $user_model->verify_login($email,$senha);
        #VERIFICANDO EXISTÊNCIA DE USUÁRIO
        if(!$usuario){
            return redirect()->back()->withInput()->with('erro','Erro, verifique seu Email e/ou Senha') ;
            #RETORNANDO EM CASO DE ERRO
        }

        $data_session = [ //INFORMAÇÕES DE LOGIN
            'id' => $usuario->id,
            'nome'=>$usuario->name,
            'cargo'=>$usuario->role,
            'coins'=>$usuario->coins,
            'imagem'=>$usuario->profile,
            'acesso'=>$usuario->access
        ];
        session()->set($data_session);//INICIANDO SESSÃO DE LOGIN

        return redirect()->to('/dashboard');
        #RETORNANDO VIEW DE DASHBOARD        
    }

    public function logout(){//LOGOUT

        session()->destroy();
        #ENCERRANDO SESSÃO DE LOGIN

        return redirect()->to('/');
        #RETORNANDO VIEW DE LOGIN
    }
}
