<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

#ROTAS DE AUTENTICAÇÃO
$routes->get('/', 'Auth::index');         //TELA DE LOGIN
$routes->post('/submit', 'Auth::submit'); //ENCAMINHANDO PARA ROTA DE VALIDAÇÃO
$routes->get('/logout','Auth::logout');   //ROTA DE LOGOUT

#ROTAS DO DASHBOARD
$routes->group('/dashboard', ['filter' => 'auth'], function($routes){ //AGRUPANDO ROTAS PROTEGIDAS PELO FILTRO DE LOGIN

  $routes->get('','Main::index'); //DASHBOARD/PÁGINA INICIAL

});