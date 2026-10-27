<?php // Ex. 3.9 e 3.13 ?>
<h1>Arrays</h1>

<?php
// Array indexado: o PHP atribui índices numéricos automaticamente.
$indexed_array = ['maçã', 'banana', 'laranja'];

// Array associativo: cada valor tem uma chave com nome.
$associative_array = [
    'nome' => 'Ana',
    'idade' => 20,
    'cidade' => 'Lisboa'
];

// true faz print_r devolver o conteúdo como texto.
$indexed_array_output = print_r($indexed_array, true);
$associative_array_output = print_r($associative_array, true);

echo '<pre>' . htmlspecialchars($indexed_array_output) . '</pre>';
echo '<pre>' . htmlspecialchars($associative_array_output) . '</pre>';
?>