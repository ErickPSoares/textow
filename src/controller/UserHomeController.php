<?php

namespace App\Controller;

class UserHomeController 
{
    function home ()
    {
        $userHome = new \App\Model\UserHome;

        // Define de qual usuário vai buscar
        $userHome->setID($_SESSION['id']);
        // Busca as postagens do usuário logado
        $retorno = $userHome->buscaPost($_SESSION['id']); // necessita revisão

        switch ($retorno) 
        {
            case false:
                return[
                    'mensagem' => 'Nenhuma postagem disponível, comece já!',
                    'posts' => [],
                    'view'  => 'home'
                ];
            case 'erro':
                return[
                    'mensagem' => 'Erro inesperado! Contate o administrador.',
                    'posts' => [],
                    'view'  => 'home'
                ];
            default:
                $nome = $_SESSION['nome'];
                return[
                    'mensagem' => 'Suas postagens:',
                    'nome' => $nome,
                    'posts' => $retorno,
                    'view'  => 'home'
                ];
        }
    }
}
