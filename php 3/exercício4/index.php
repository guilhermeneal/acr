<?php
$created = isset($_GET['created']) && $_GET['created'] === 'true';
?>
<!doctype html>
<html lang="pt-PT">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão de utilizadores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require __DIR__ . '/nav.php'; ?>
    <main>
        <h1>Gestão de utilizadores</h1>
        <?php if ($created): ?>
            <p class="success" role="status">Utilizador criado com sucesso</p>
        <?php endif; ?>
        <p>Usa o menu para registar um utilizador ou consultar a lista.</p>
    </main>
</body>
</html>
