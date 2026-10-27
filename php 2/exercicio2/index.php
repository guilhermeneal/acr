<?php
require_once __DIR__ . '/classes/product.php';
session_start();
Product::initClass();
$_SESSION['produtos'] ??= [];
?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="container">
        <header class="page-header">
            <div>
                <p class="eyebrow">Catálogo</p>
                <h1>Os teus produtos</h1>
                <p class="subtitle">Gere o catálogo e acompanha o stock num só lugar.</p>
            </div>
            <a class="button button-primary add-button" href="product.php">＋ Novo produto</a>
        </header>

        <?php if (empty($_SESSION['produtos'])): ?>
            <section class="empty-state">
                <div class="empty-icon">✦</div>
                <h2>Ainda não tens produtos</h2>
                <p>Adiciona o primeiro produto para começar o teu catálogo.</p>
                <a class="button button-primary" href="product.php">Criar primeiro produto</a>
            </section>
        <?php else: ?>
            <section class="catalog-section">
                <div class="section-heading">
                    <h2>Catálogo</h2>
                    <span><?= count($_SESSION['produtos']) ?> produto(s)</span>
                </div>
                <ul class="product-list">
                    <?php foreach ($_SESSION['produtos'] as $produto): ?>
                        <?= $produto->listItem() ?>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>

        <footer><a class="clear-link" href="clear.php">Limpar sessão</a></footer>
    </main>
</body>
</html>
