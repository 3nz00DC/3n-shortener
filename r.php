if ($link) {
    // Aqui o código pega a URL que está salva no seu banco de dados
    $url_destino = $link['https://3nz00dc.github.io/3n-shortener/']; 

    // Se você quiser que TODOS os links vão para um lugar só (ex: seu Discord)
    // basta trocar a linha acima por: $url_destino = "https://dc.gg/3nhost.com";

    header("Location: " . $url_destino);
    exit;
}
