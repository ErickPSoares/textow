<?php

namespace App\View;

require_once __DIR__ . '/../../autoload.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta</title>
</head>
<body>
    <h2>Criar Conta</h2>
    <form action="../Controller/UserRegister.php" method="POST">
        <label for="username">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br><br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="password">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br><br>
        <button type="submit" name="cadastrar">Criar conta</button>
    </form>
    <?php 

        session_start();

        if (isset($_SESSION['mensagem'])) {
            $mensagem = $_SESSION['mensagem'];
        } else {
            $mensagem = null;
        }

        if (isset($_SESSION['mensagem_tipo'])) {
            $tipo = $_SESSION['mensagem_tipo'];
        } else {
            $tipo = null;
        }
        if ($mensagem) 
        {
            if ($tipo === 'sucesso') {
                $cor = 'green';
            } else {
                $cor = 'red';
            }
            echo '<div style="color: '.$cor.'; margin-bottom: 10px;">' . htmlspecialchars($mensagem) . '</div>';
        } 
        
        // Limpa a sessão para a mensagem aparecer uma única vez
        unset($_SESSION['mensagem']);
        unset($_SESSION['mensagem_tipo']);
        ?>
</body>
</html>