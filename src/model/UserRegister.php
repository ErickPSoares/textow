<?php

namespace App\Model;

require_once __DIR__ . '/../autoload.php';

USE PDOException;

class UserRegister extends \App\Model\Connection
{

    private $id;
    private $nome;
    private $email;
    private $senha;
   

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
        $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
    }

    public function insertUsuario()
    {
        $pdo = $this->connection();

        $sql = $pdo->prepare("INSERT INTO `usuario` VALUES (NULL, ?, ?, ?) ");
        try
        {
            $sql->execute(array($this->nome,$this->email, $this->senha));
            return null; //sucesso no cadastro
        }
        catch(PDOException $e) 
        {
            if ($e->getCode() == 23000 && strpos($e->getMessage(), '1062') !== false) {
                return 1062; //registro duplicado
            } else {
                return $e->getMessage(); // Outros erros PDO
            }
        }
    }

   /* public function existeUsuario($nome, $email, $senha)
    {
        $pdo = $this->connection();
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE nome = ? AND email = ? AND senha = ? LIMIT 1");
        $sql->execute(array($nome, $email, $senha));
        $resultado = $sql->fetch();
        return $resultado;
    }

    public function selectCadastro()
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT * FROM cadastro");
        $sql->execute();
        $resultado = $sql->fetchAll();
        return $resultado;
    }

    public function selectIdResponsavel()
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT * FROM responsavel");
        $sql->execute();
        $resultado = $sql->fetchAll();
        return $resultado;
    }
    public function selectTurma()
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("SELECT * FROM turma");
        $sql->execute();
        $resultado = $sql->fetchAll();
        return $resultado;
    }

    public function updateCadastro($id)
    {
        $nomeAluno = $this->nomeAluno;
        $genero = $this->genero;
        $etnia = $this->etnia;
        $nascimento = $this->nascimento;

        $pdo = $this->conexao();
        $sql = $pdo->prepare("UPDATE `cadastro` SET nomeAluno = ?, genero = ?, etnia = ?, nascimento = ? WHERE idCadastro = ?");
        $sql->execute(array($nomeAluno, $genero, $etnia, $nascimento, $id));
    }

    public function deletaCadastro($id)
    {
        $pdo = $this->conexao();
        $sql = $pdo->prepare("DELETE FROM `cadastro` WHERE idCadastro = ?");
        $sql->execute(array($id));
    }
        */
}