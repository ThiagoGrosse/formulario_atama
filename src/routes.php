<?php

use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');
$router->get('/logout', 'LoginController@logout');

$router->get('/perfil', 'PerfilController@index');
$router->post('/perfil/editar', 'PerfilController@editarPerfil');
$router->post('/perfil/alterar/senha', 'PerfilController@alterarSenha');

$router->get('/usuarios', 'UsuariosController@index');
$router->post('/usuarios/novo-usuario', 'UsuariosController@novoUsuario');
$router->get('/usuarios/get-user/{id}', 'UsuariosController@getUser');
$router->get('/usuarios/remove/{id}', 'UsuariosController@removeUser');
$router->post('/usuarios/edit', 'UsuariosController@editUser');
$router->post('/edit-img-profile', 'PerfilController@alterarImagemPerfil');

$router->get('/cadastro', 'LoginController@signup');
$router->post('/cadastro', 'LoginController@signupAction');

$router->get('/formulario/{key}', 'FormController@index');
$router->post('/create', 'FormController@create');

$router->post('/save-id-visual', 'FormController@saveIdVisual');
$router->post('/save-info-tema', 'FormController@saveInfoTema');
$router->post('/save-acesso-plataforma', 'FormController@saveAcessoPlataforma');
$router->post('/save-dominio', 'FormController@saveDominio');
$router->post('/save-quem-somos', 'FormController@saveQuemSomos');
$router->post('/save-contato', 'FormController@saveContato');
$router->post('/save-pagamento', 'FormController@savePagamento');
$router->post('/save-envio', 'FormController@saveEnvio');
$router->post('/save-precos-descontos', 'FormController@savePrecosDescontos');
$router->post('/save-marketplaces', 'FormController@saveMarketplaces');

$router->get('/set-completed/{token}', 'FormController@setCompleted');
$router->get('/set-archived/{token}', 'FormController@setArchived');

$router->get('/tabelas/{token}', 'TabelasController@index');
