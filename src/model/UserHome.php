<?php

namespace App\Model;

require_once __DIR__ . '/../autoload.php';

use PDO;
USE PDOException;

class UserHome extends \App\Model\Connection 

{
    private $fk_usuario_id;

    function setID($id){
        $this->fk_usuario_id = $id;
    }

     public function buscaPost()
    {
        $pdo = $this->connection();
        $sql = $pdo->prepare("SELECT * FROM postagem WHERE fk_usuario_id = ? LIMIT 10");
        try
        {
            $sql->execute(array($this->fk_usuario_id));
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
            return $resultado; //sucesso na busca ou retorno false caso não encontre nada.
        }
        catch(PDOException) 
        {
            return 'erro';
        }
    }
}

?>