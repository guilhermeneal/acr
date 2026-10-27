<?php
// Ex. 3.5–3.8
include 'initialize.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Aplicações Centradas em Redes</title>
</head>
<body>
    <?php
    echo generate_menu();

    $page_name = get_current_page_name();
    include $page_name . '.php';
    ?>
</body>
</html>