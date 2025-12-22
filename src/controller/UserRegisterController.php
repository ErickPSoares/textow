<?php

namespace App\Controller;


class UserRegisterController
{
    public function register ()
    {
        if (isset($_POST['cadastrar'])) 
        {
            $userRegister = new \App\Model\UserRegister;
            $userRegister->setNome($_POST['nome']);
            $userRegister->setEmail($_POST['email']);
            $userRegister->setSenha($_POST['senha']);

            $retorno = $userRegister->insertUsuario();

            switch ($retorno) 
            {
                case null:
                    return [ 
                    'mensagem' => 'Usuário cadastrado com sucesso!',
                    'view' => 'login'
                    ];
                    break;
                case 1062:
                    return [ 
                    'mensagem' => 'Erro: este e-mail já está cadastrado.',
                    'view' => 'register'
                    ];
                    break;
                default:
                    return [ 
                    'mensagem' => 'Erro ao cadastrar.',
                    'view' => 'register'
                    ];
                    break;
            }
        }
        else
        {
            return    [ 
            'mensagem' => '',
            'view' => 'register'
            ];

        }
    }
}

?>