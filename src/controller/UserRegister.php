<?php

require_once '../model/UserRegister.php';

$userRegister = new UserRegister();

if (isset($_POST['cadastrar'])) {
            
    $userRegister->setNome($_POST['nome']);
    $userRegister->setEmail($_POST['email']);
    $userRegister->setSenha($_POST['senha']);

    $userRegister->insertUsuario();
}

?>