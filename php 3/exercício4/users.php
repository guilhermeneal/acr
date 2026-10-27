<?php
declare(strict_types=1);

$errorMessage = null;
$users = [];
try {
    require __DIR__ . '/db.php';
    $statement = $pdo->query('CALL get_all_users()');
    $users = $statement->fetchAll();
    $statement->closeCursor();
} catch (Throwable $error) {
    error_log($error->getMessage());
    $errorMessage = 'Não foi possível carregar os utilizadores. Confirma a ligação à base de dados.';
}

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!doctype html>
<html lang="pt-PT">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de utilizadores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require __DIR__ . '/nav.php'; ?>
    <main>
        <h1>Lista de Utilizadores</h1>
        <?php if ($errorMessage !== null): ?>
            <p class="error" role="alert"><?= escape($errorMessage) ?></p>
        <?php elseif ($users === []): ?>
            <p>Ainda não existem utilizadores registados.</p>
        <?php else: ?>
            <div class="table-wrap">
                <table>
                    <thead><tr><th>ID</th><th>Username</th><th>Nome</th><th>Morada</th><th>Email</th></tr></thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= escape((string) $user['ID']) ?></td>
                                <td><?= escape((string) $user['Username']) ?></td>
                                <td><?= escape((string) $user['Name']) ?></td>
                                <td><?= escape((string) $user['Address']) ?></td>
                                <td><?= escape((string) $user['Email']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
