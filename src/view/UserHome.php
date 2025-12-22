<?php

namespace App\src\View;

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
        echo '<div>' . htmlspecialchars($mensagem) . '</div>';
        echo '<div>' . htmlspecialchars($nome) . '</div>';
    ?>

    <form action="/index.php?route=logout" method="POST">
        <button type="submit" name="sair">Sair</button>
    </form>
    <?php
         foreach ($posts as $key => $value){
            echo '<div>'.'Post:'. $key . $value .'</div>';}
    ?>

</body>
</html>