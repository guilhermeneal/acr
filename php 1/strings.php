<?php // Ex. 3.9 e 3.12 ?>
<h1>Strings</h1>

<?php
$string1 = 'Casa';
$string2 = 'Mundo';

echo '<p>Primeira string: ' . $string1 . '</p>';
echo '<p>Comprimento da primeira string: ' . strlen($string1) . '</p>';
echo '<p>Segunda string: ' . $string2 . '</p>';
echo '<p>Comprimento da segunda string: ' . strlen($string2) . '</p>';

if ($string1 === $string2) {
    echo '<p>As strings são iguais.</p>';
} else {
    echo '<p>As strings são diferentes.</p>';
}
?>