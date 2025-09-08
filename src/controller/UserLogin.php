<?php

namespace App\Controller;

require_once __DIR__ . '/../autoload.php';

session_start();

$userLogin = new \App\Model\UserLogin;

if (isset($_POST['entrar']))
{
    $userLogin->setEmail($_POST['email']);
    $senha = $_POST['senha'];
    $retorno = $userLogin->buscaUsuario();

    if (!password_verify($senha,$retorno['senha']))
    {
        $retorno = false;
    }

    switch ($retorno) 
    {
        case false:
            $_SESSION['mensagem'] = 'E-mail ou senha incorretos! Tente novamente ou realize seu cadastro.';
            header('Location: /index.php?route=src/view/UserLogin.php');
            exit();
        case 'erro':
            $_SESSION['mensagem'] = 'Erro inesperado! Contate o administrador do sistema.';
            header('Location: /index.php?route=src/view/UserLogin.php');
            exit();
        default:
            $_SESSION['mensagem'] = 'Login efetuado com sucesso!';
            $_SESSION['nome'] = $retorno['nome'];
            header('Location: /index.php?route=src/view/UserHome.php');
            exit();
    }
}

if (isset($_POST['sair']))
{
    unset($_SESSION['nome']);
    session_destroy();
    header('Location: /index.php?route=src/view/UserLogin.php');
    exit();
}
