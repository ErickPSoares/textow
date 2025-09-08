<?php

namespace App\View;

require_once __DIR__ . '/../autoload.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="/index.php?route=src/Controller/UserLogin.php" method="POST">       
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="password">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br><br>
        <button type="submit" name="entrar">Entrar</button>
    </form>
    <a href="/index.php?route=src/view/UserRegister.php">Cadastre-se</a>
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

