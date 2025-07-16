<?php

namespace App\Model;

use PDO;
use PDOException;

class Connection
{
    public function connection()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=login', 'root', '');
            // Definindo o modo de erro do PDO para exceção
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            // Log ou mensagem de erro
            echo 'Erro na conexão com o banco de dados: ';
            return null;
        }
    }
}
?>