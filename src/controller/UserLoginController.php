<?php

namespace App\Controller;

require_once __DIR__ . '/../autoload.php';

class UserLoginController
{
    function login ()
    {
        if (isset($_POST['entrar'])) 
        {
            $userLogin = new \App\Model\UserLogin;
            $userLogin->setEmail($_POST['email']);
            $senha = $_POST['senha'];
            $retorno = $userLogin->buscaUsuario();

            if (!password_verify($senha, $retorno['senha'] ?? '')) {
                $retorno = false;
            }
                switch ($retorno) {
                    case false:
                        return [
                            'id'=> '',
                            'nome' => '',
                            'mensagem' => 'E-mail ou senha incorretos!',
                            'view' => 'login'
                        ];
                    case 'erro':
                        return [
                            'id'=> '',
                            'nome' => '',
                            'mensagem' => 'Erro inesperado! Contate o administrador.',
                            'view' => 'login'
                        ];
                    default:
                        $_SESSION['id'] = $retorno['id'] ;
                        $_SESSION['nome'] = $retorno['nome'];
                        return [
                            'id'=> $retorno['id'],
                            'nome' => $retorno['nome'],
                            'mensagem' => 'Login efetuado com sucesso!',
                            'view' => 'home'
                        ];
            }
        }
        else
        {
            // Se acessar o controller sem um POST, renderiza a sua view login
            return [ 
            'mensagem' => '',
            'view' => 'login'
            ];
        }
    }

    function logout ()
    {
        if (isset($_POST['sair'])) {
            session_destroy();
            return [ 
            'mensagem' => 'Você foi deslogado!',
            'view' => 'login'
            ];
        }
    }
}

