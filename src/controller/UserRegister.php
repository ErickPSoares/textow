<?php

namespace App\Controller;

use App\Model;

require_once __DIR__ . '/../../autoload.php';

$userRegister = new \App\Model\UserRegister;

if (isset($_POST['cadastrar'])) {
            
    $userRegister->setNome($_POST['nome']);
    $userRegister->setEmail($_POST['email']);
    $userRegister->setSenha($_POST['senha']);

    $userRegister->insertUsuario();
}

?>