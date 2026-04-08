<?php
require 'core/config.php';
$codigo = $_GET['c'] ?? '';

if ($codigo) {
    $stmt = $pdo->prepare("SELECT url_original FROM links WHERE codigo_curto = ?");
    $stmt->execute([$codigo]);
    $link = $stmt->fetch();

    if ($link) {
        $pdo->prepare("UPDATE links SET cliques = cliques + 1 WHERE codigo_curto = ?")->execute([$codigo]);
        header("Location: " . $link['url_original']);
        exit;
    }
}
echo "Link expirado ou inexistente.";
?>