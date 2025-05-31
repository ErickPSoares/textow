<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="src/controller/UserLogin.php" method="POST">       
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="password">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
