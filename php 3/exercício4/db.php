<?php
declare(strict_types=1);

// Use the same host, port, username and password as the Laragon connection in Workbench.
$host = '127.0.0.1';
$port = 3306;
$database = 'acr05';
$username = 'root';
$password = ''; // If Workbench asks for a password, put that same password here.

$dsn = "mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4";

$pdo = new PDO($dsn, $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]);
