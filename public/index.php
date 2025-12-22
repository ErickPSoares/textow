<?php

require_once __DIR__ . '/../src/autoload.php';

$routes = require __DIR__ . '/../src/routes.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Obtém rota da URL, ou usa "login" como padrão
$route = $_GET['route'] ?? 'login';

// Chama o controller correspondente a cada rota extraida da url
switch ($route)
{
case 'login':
case 'home':
   $userLogin = new \App\Controller\UserLoginController;
   $retorno = $userLogin-> login();
   $view = $retorno['view'];
   $mensagem = $retorno['mensagem'];
   break;
case 'logout':
   $userLogin = new \App\Controller\UserLoginController;
   $retorno = $userLogin-> logout();
   $view = $retorno['view'];
   $mensagem = $retorno['mensagem'];
   break;
case 'register':
   $userRegister = new \App\Controller\UserRegisterController;
   $retorno = $userRegister-> register();
   $view = $retorno['view'];
   $mensagem = $retorno['mensagem'];
   break;
default:
   $view = '404';
}

// se o login tiver sucesso, é necessário buscar os dados de home
if ($view == 'home')
{
   $userHome = new \App\Controller\UserHomeController;
   $retorno = $userHome-> home();
   $view = $retorno['view'];
   $posts = $retorno['posts'];
   $mensagem = $retorno['mensagem'];
   $nome = $retorno['nome'];
}

// se a rota home for escolhida, mas não tiver realizado login, manda para login.
if($view =='home' and !isset($_SESSION['id']))
{
   $view = 'login';
}

// Carrega a view correspondente após verificação do fluxo
require __DIR__ . '/../' . $routes[$view];