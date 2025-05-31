

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta</title>
</head>
<body>
    <h2>Criar Conta</h2>
    <form action="../controller/UserRegister.php" method="POST">
        <label for="username">Usuário:</label>
        <input type="text" id="nome" name="nome" required>
        <br><br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="password">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br><br>
        <button type="cadastrar" name="cadastrar">Criar conta</button>
    </form>
</body>
</html>
