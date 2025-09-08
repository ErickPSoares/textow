<?php

if (session_status() === PHP_SESSION_NONE) 
{
    session_start();
}

$permitted_routes = require_once __DIR__ . '/../src/routes.php';

$route = $_GET['route'] ?? 'src/view/UserLogin.php';

// proteção de rota home para não logados
if (!isset($_SESSION['nome']) and $route === 'src/view/UserHome.php') 
{
    header('Location: /index.php?route=src/view/UserLogin.php');
    exit();
}

// proteção de rotas para logados
if (isset($_SESSION['nome']) and $route === 'src/view/UserLogin.php' or isset($_SESSION['nome']) and $route === 'src/view/UserRegister.php') 
{
    header('Location: /index.php?route=src/view/UserHome.php');
    exit();
}

if (!in_array($route, $permitted_routes)) 
{
    $route = 'src/view/404.php';
}

require_once __DIR__ . '/../' . $route;
