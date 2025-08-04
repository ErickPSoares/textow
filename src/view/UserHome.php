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
    <title>Página Inicial</title>
</head>
<body>
    <?php 
        if (isset($_SESSION['mensagem']))
        {
            $mensagem = $_SESSION['mensagem'];
            echo '<div>' . htmlspecialchars($mensagem) . '</div>';
        }
        if (isset($_SESSION['nome'])) 
        {
            $nome = $_SESSION['nome'];
            echo '<div>' . htmlspecialchars($nome) . '</div>';
            unset($_SESSION['mensagem']);
        }
    ?>
    
    <form action="../controller/UserLogin.php" method="post">
    <button type="submit" name="sair">Sair</button>
    </form>
</body>
</html>