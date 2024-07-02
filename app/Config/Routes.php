<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

#ROTAS DE AUTENTICAÇÃO
$routes->get('/', 'Auth::index',['filter' => 'login']);         //TELA DE LOGIN
$routes->post('/submit', 'Auth::submit',['filter' => 'login']); //ENCAMINHANDO PARA ROTA DE VALIDAÇÃO
$routes->get('/logout','Auth::logout');   //ROTA DE LOGOUT

#ROTAS DO DASHBOARD
$routes->group('/dashboard', ['filter' => 'auth'], function($routes){ //AGRUPANDO ROTAS PROTEGIDAS PELO FILTRO DE LOGIN

  $routes->get('','Main::index'); //DASHBOARD/PÁGINA INICIAL
  $routes->get('search','Main::index'); //PESQUISA DE MEMBRO

  $routes->get('coins/(:num)','Main::coins/$1'); //VIEW PARA MODIFICAR COINS DO MEMBRO
  $routes->post('coins/submit','Main::coinSubmit'); //CONTROLLER PARA MODIFICAR COINS DO MEMBRO

});