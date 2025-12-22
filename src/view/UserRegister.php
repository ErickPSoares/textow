<?php

namespace App\View;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/UserRegister.css">
    <title>Criar conta</title>
</head>
<body>
    <h2>Criar Conta</h2>
    <form action="/index.php?route=register" method="POST">
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
    <a href="/index.php?route=login">Entrar</a>
    <?php 
        echo '<div>' . htmlspecialchars($mensagem) . '</div>';
    ?>
</body>
</html>