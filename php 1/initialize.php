<?php
// Ex. 3.1–3.4

// A ordem define o número de cada página no URL.
define('PAGES', ['home', 'vars', 'strings', 'arrays', 'about']);

// Lê p do URL; se não existir, abre a página home (índice 0).
$current_page = isset($_GET['p']) ? (int) $_GET['p'] : 0;

// Cria um link para cada página usando o respetivo índice.
function generate_menu()
{
    $html = '<ul>';

    foreach (PAGES as $index => $page) {
        $html .= '<li><a href="./?p=' . $index . '">' . $page . '</a></li>';
    }

    return $html . '</ul>';
}

// Devolve o nome da página atual ou home se o índice for inválido.
function get_current_page_name()
{
    return PAGES[$GLOBALS['current_page']] ?? PAGES[0];
}