<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

#ROTAS DE AUTENTICAÇÃO
$routes->get('/', 'Auth::index', ['filter' => 'login']);         //TELA DE LOGIN
$routes->post('/submit', 'Auth::submit', ['filter' => 'login']); //ENCAMINHANDO PARA ROTA DE VALIDAÇÃO
$routes->get('/logout', 'Auth::logout');                         //ROTA DE LOGOUT

#ROTAS DO DASHBOARD
$routes->group('/dashboard/', ['filter' => 'auth'], function ($routes) { //AGRUPANDO ROTAS PROTEGIDAS PELO FILTRO DE LOGIN

  $routes->get('', 'Main::index');       //DASHBOARD/PÁGINA INICIAL
  $routes->get('search', 'Main::index'); //PESQUISA DE MEMBRO

  #ROTAS CRUD
  $routes->group('coins/', ['filter' => 'access'], function ($routes) {
    $routes->get('(:num)', 'Main::coins/$1', ['filter' => 'access']); //VIEW MODIFICAR/ADICIONAR COINS DO MEMBRO
    $routes->post('submit', 'Main::coinSubmit');                      //MODIFICAR COINS DO MEMBRO
    $routes->get('update/(:num)/(:num)', 'Main::update/$1/$2');       //VIEW ATUALIZAR COINS
    $routes->post('updateSubmit', 'Main::updateSubmit');              //ATUALIZAR COINS
    $routes->get('delete/(:num)', 'Main::delete/$1');                 //DELETAR COINS
  });
});
