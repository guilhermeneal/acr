<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php', true, 303);
    exit;
}

$username = trim($_POST['username'] ?? '');
$name = trim($_POST['name'] ?? '');
$address = trim($_POST['address'] ?? '');
$email = trim($_POST['email'] ?? '');

if ($username === '' || $name === '' || $address === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit('Dados invalidos. Volta ao formulario e verifica os campos.');
}

try {
    require __DIR__ . '/db.php';
    $statement = $pdo->prepare('CALL create_new_user(?, ?, ?, ?)');
    $statement->execute([
        $username,
        $name,
        $address,
        $email,
    ]);
    $statement->closeCursor();

    header('Location: index.php?created=true', true, 303);
    exit;
} catch (Throwable $error) {
    error_log($error->getMessage());
    http_response_code(500);
    $detail = htmlspecialchars($error->getMessage(), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    exit('Nao foi possivel criar o utilizador. Erro local: ' . $detail);
}
