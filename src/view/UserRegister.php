<?php

namespace App\View;

require_once __DIR__ . '/../../autoload.php';

session_start()

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
        if (isset($_SESSION['mensagem'])) 
        {
            $mensagem = $_SESSION['mensagem'];
            echo '<div>' . htmlspecialchars($mensagem) . '</div>';
            unset($_SESSION['mensagem']);
        }
    ?>
</body>
</html>