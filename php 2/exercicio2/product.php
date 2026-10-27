<?php
require_once __DIR__ . '/classes/product.php';
session_start();
Product::initClass();
$_SESSION['produtos'] ??= [];

$produto = null;
if (isset($_GET['id'])) {
    foreach ($_SESSION['produtos'] as $item) {
        if ($item->id == $_GET['id']) {
            $produto = $item;
            break;
        }
    }
}

function escapar($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $produto ? 'Editar Produto' : 'Novo Produto' ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="container form-container">
        <a class="back-link" href="index.php">← Voltar ao catálogo</a>
        <header class="form-header">
            <p class="eyebrow">Catálogo</p>
            <h1><?= $produto ? 'Editar produto' : 'Novo produto' ?></h1>
            <p class="subtitle"><?= $produto ? 'Atualiza os detalhes deste produto.' : 'Preenche os detalhes para adicionar ao catálogo.' ?></p>
        </header>

        <form class="form-card" action="saveproduct.php" method="post">
            <input type="hidden" name="id" value="<?= $produto ? (int) $produto->id : '' ?>">
            <label>Nome do produto<input type="text" name="name" placeholder="Ex.: Caderno" value="<?= escapar($produto->name ?? '') ?>" required></label>
            <label>Descrição<input type="text" name="description" placeholder="Uma breve descrição" value="<?= escapar($produto->description ?? '') ?>" required></label>
            <label>Valor (€)<input type="number" name="value" min="0" step="0.01" placeholder="0,00" value="<?= escapar($produto->value ?? '') ?>" required></label>
            <button class="button button-primary submit-button" type="submit">Guardar produto</button>
        </form>

    </main>
</body>
</html>
