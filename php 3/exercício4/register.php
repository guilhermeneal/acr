<!doctype html>
<html lang="pt-PT">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registo de utilizador</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require __DIR__ . '/nav.php'; ?>
    <main>
        <h1>Registar utilizador</h1>
        <form action="exec_reg.php" method="post">
            <label for="username">Username</label>
            <input id="username" name="username" maxlength="100" required>

            <label for="name">Nome</label>
            <input id="name" name="name" maxlength="100" required>

            <label for="address">Morada</label>
            <input id="address" name="address" maxlength="100" required>

            <label for="email">Email</label>
            <input id="email" name="email" type="email" maxlength="100" required>

            <button type="submit">Registar</button>
        </form>
    </main>
</body>
</html>
