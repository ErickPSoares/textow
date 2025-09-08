<?php

namespace  App\Model;

require_once __DIR__ . '/../autoload.php';

USE PDOException;

class UserLogin extends \App\Model\Connection
{
    private $email;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function buscaUsuario()
    {
        $pdo = $this->connection();
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = ? LIMIT 1");
        try
        {
            $sql->execute(array($this->email));
            $resultado = $sql->fetch();
            return $resultado; //sucesso na busca ou retorno false caso não encontre nada.
        }
        catch(PDOException) 
        {
            return 'erro';
        }
    }
}
?>