<?php

namespace App\Controller;

require_once __DIR__ . '/../../autoload.php';

session_start();

$userRegister = new \App\Model\UserRegister;

if (isset($_POST['cadastrar'])) 
{
            
    $userRegister->setNome($_POST['nome']);
    $userRegister->setEmail($_POST['email']);
    $userRegister->setSenha($_POST['senha']);

    $retorno = $userRegister->insertUsuario();

    switch ($retorno) 
    {
        case null:
            $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
            header('Location: ../view/UserLogin.php');
            break;
        case 1062:
            $_SESSION['mensagem'] = "Erro: este e-mail já está cadastrado.";
            header('Location: ../view/UserRegister.php');
            break;
        default:
            $_SESSION['mensagem'] = "Erro ao cadastrar.";
            header('Location: ../view/UserRegister.php');
            break;
    }



}

?>