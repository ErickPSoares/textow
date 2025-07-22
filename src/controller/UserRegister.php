<?php

namespace App\Controller;

require_once __DIR__ . '/../../autoload.php';

session_start();

$userRegister = new \App\Model\UserRegister;

if (isset($_POST['cadastrar'])) {
            
    $userRegister->setNome($_POST['nome']);
    $userRegister->setEmail($_POST['email']);
    $userRegister->setSenha($_POST['senha']);

    $retorno = $userRegister->insertUsuario();
    if ($retorno) {
        $_SESSION['mensagem'] = $retorno;
        $_SESSION['mensagem_tipo'] = 'erro';
    } else {
        $_SESSION['mensagem'] = 'Usuário cadastrado com sucesso!';
        $_SESSION['mensagem_tipo'] = 'sucesso';
    }

    header('Location: ../view/UserRegister.php');
    exit;
}

?>