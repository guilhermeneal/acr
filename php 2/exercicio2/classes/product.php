<?php
class Product
{
    public $id;
    public $name;
    public $description;
    public $value;
    public $stock;

    public static $lastId = 0;

    public function __construct($name, $description, $value)
    {
        self::$lastId++;
        $this->id = self::$lastId;
        $this->name = $name;
        $this->description = $description;
        $this->value = $value;
        $this->stock = 0;

        $_SESSION['lastId'] = self::$lastId;
    }

    public static function initClass()
    {
        self::$lastId = $_SESSION['lastId'] ?? 0;
    }

    public function listItem()
    {
        $description = function_exists('mb_substr')
            ? mb_substr($this->description, 0, 15, 'UTF-8')
            : substr($this->description, 0, 15);

        $id = (int) $this->id;
        $name = htmlspecialchars($this->name, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
        $value = number_format((float) $this->value, 2, ',', '.') . ' €';

        return '<li class="product-card">'
            . '<div class="product-info">'
            . '<span class="product-number">Produto ' . $id . '</span>'
            . '<h3>' . $name . '</h3>'
            . '<p class="description">' . $description . '</p>'
            . '<p class="price">' . $value . '</p>'
            . '<p class="stock">Em stock: <strong>' . (int) $this->stock . '</strong></p>'
            . '</div>'
            . '<div class="product-actions">'
            . '<a class="button button-secondary" href="product.php?id=' . $id . '">Editar</a>'
            . '<a class="button button-primary" href="buy.php?id=' . $id . '">+ Comprar</a>'
            . '<a class="button button-secondary" href="sell.php?id=' . $id . '">− Vender</a>'
            . '</div>'
            . '</li>';
    }
}
