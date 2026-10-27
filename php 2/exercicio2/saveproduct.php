<?php
require_once __DIR__ . '/classes/product.php';
session_start();
Product::initClass();
$_SESSION['produtos'] ??= [];

$id = $_POST['id'] ?? '';
$name = trim($_POST['name'] ?? '');
$description = trim($_POST['description'] ?? '');
$value = (float) ($_POST['value'] ?? 0);

if ($name !== '' && $description !== '' && $value >= 0) {
    $produto = null;

    if ($id !== '') {
        foreach ($_SESSION['produtos'] as $item) {
            if ($item->id == $id) {
                $produto = $item;
                break;
            }
        }
    }

    if ($produto) {
        $produto->name = $name;
        $produto->description = $description;
        $produto->value = $value;
    } else {
        $_SESSION['produtos'][] = new Product($name, $description, $value);
    }
}

header('Location: index.php');
exit;
