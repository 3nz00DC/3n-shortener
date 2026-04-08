<?php
session_start();
require 'core/config.php';

if (isset($_POST['login'])) {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->execute([$_POST['user']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['pass'], $user['senha'])) {
        $_SESSION['logado'] = true;
        header("Location: dashboard.php");
    } else { $erro = "Credenciais inválidas!"; }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login | 3n Shortener</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container" style="max-width: 400px;">
        <div class="card">
            <h2>Acesso Restrito</h2>
            <form method="POST">
                <input type="text" name="user" placeholder="Usuário" required>
                <input type="password" name="pass" placeholder="Senha" required>
                <button type="submit" name="login">Entrar</button>
            </form>
            <?php if(isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>
        </div>
    </div>
</body>
</html>