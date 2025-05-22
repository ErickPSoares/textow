<?php

require_once '../view/userRegister.php';

require_once '../controller/userRegister.php';

require_once 'connection.php';


class UserRegister extends Connection
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
    }

    public function insertUsuario()
    {
        $pdo = $this->connection();
        $sql = $pdo->prepare("INSERT INTO `usuario` VALUES (NULL, ?, ?, ?) ");
        $nome = $this->nome;
        $email = $this->email;
        $senha = $this->senha;
        $sql->execute(array($nome,$email,$senha));
    }

    public function existeUsuario($nome, $email, $senha)
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
}