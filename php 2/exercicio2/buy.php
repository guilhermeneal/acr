<?php
require_once __DIR__ . '/classes/product.php';
session_start();
Product::initClass();
$_SESSION['produtos'] ??= [];

$id = $_GET['id'] ?? null;
foreach ($_SESSION['produtos'] as $produto) {
    if ($produto->id == $id) {
        $produto->stock++;
        break;
    }
}

header('Location: index.php');
exit;
