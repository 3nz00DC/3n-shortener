<?php
session_start();
require 'core/config.php';
if (!isset($_SESSION['logado'])) { header("Location: login.php"); exit; }

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['url_longa'])) {
    $codigo = substr(md5(uniqid()), 0, 6);
    $stmt = $pdo->prepare("INSERT INTO links (url_original, codigo_curto) VALUES (?, ?)");
    if ($stmt->execute([$_POST['url_longa'], $codigo])) {
        $msg = "Link criado: " . $_SERVER['HTTP_HOST'] . "/" . $codigo;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | 3n Shortener</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="nav">
        <h3>Olá, 3n</h3>
        <a href="logout.php" style="color: #ff4747;">Sair</a>
    </nav>
    <div class="container">
        <div class="card">
            <h3>Encurtar Nova URL</h3>
            <form method="POST">
                <input type="url" name="url_longa" placeholder="https://exemplo.com" required>
                <button type="submit">Gerar</button>
            </form>
            <?php if($msg) echo "<p style='color:var(--success)'>$msg</p>"; ?>
        </div>

        <div class="card" style="margin-top: 20px;">
            <h3>Meus Links</h3>
            <table>
                <tr><th>Original</th><th>Curto</th><th>Cliques</th></tr>
                <?php
                $links = $pdo->query("SELECT * FROM links ORDER BY criado_em DESC")->fetchAll();
                foreach($links as $l) {
                    echo "<tr>
                            <td>".substr($l['url_original'], 0, 40)."...</td>
                            <td><strong>{$l['codigo_curto']}</strong></td>
                            <td>{$l['cliques']}</td>
                          </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>