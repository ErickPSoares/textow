<?php

namespace App\Controller;

require_once __DIR__ . '/../../autoload.php';

$userLogin = new \App\Model\UserLogin;

session_start();

if (isset($_POST['entrar']))
{
    $userLogin->setEmail($_POST['email']);
    $userLogin->setSenha($_POST['senha']);
    $retorno = $userLogin->buscaUsuario();

    switch ($retorno) 
    {
        case false:
            $_SESSION['mensagem'] = 'E-mail ou senha incorretos! Tente novamente ou realize seu cadastro.';
            header('Location: ../view/UserLogin.php');
            break;
        case 'erro':
            $_SESSION['mensagem'] = 'Erro inesperado! Contate o administrador do sistema.';
            break;
        default:
            $_SESSION['mensagem'] = 'Login efetuado com sucesso!';
            $_SESSION['nome'] = $retorno['nome'];
            header('Location: ../view/UserHome.php');
            break;
    }
}

if (isset($_POST['sair']))
{
    unset ($_SESSION['usuario']);
    session_destroy();
    header('Location: /textow/index.php');
}
