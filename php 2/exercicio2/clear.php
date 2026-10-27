<?php
session_start();
$_SESSION = [];
session_destroy();
session_start();
$_SESSION = [];

header('Location: index.php');
exit;
