<?php

class Category {

    public $name;

    function __construct(string $name) {
        $this->name = $name;
    }

}

class Product {

    public $title;
    public $price;
    public $img;
    protected $category;

    function __construct(string $title, float $price, string $img, Category|null $category) {
        $this->title = $title;
        $this->price = $price;
        $this->img = $img;
        $this->setCategory($category);
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory(Category $category) {
        $this->category = $category;
    }

}

class Food extends Product {

    public $ingredient;

    function __construct(string $title, float $price, string $img, Category|null $category, string $material = null) {
        parent::__construct($title, $price, $img)
        $this->ingredient = $ingredient;
    }
}

class Toy extends Product {

    public $material;

    function __construct(string $title, float $price, string $img, Category|null $category, string $material = null) {
        parent::__construct($title, $price, $img)
        $this->material = $material;
    }
}

class PetBed extends Product {

    public $size;
    
    function __construct(string $title, float $price, string $img, Category|null $category, string $material = null) {
        parent::__construct($title, $price, $img)
        $this->size = $size;
    }
}

$gatti = new Category('Gatti');
$cani = new Category('Cani');

$gattiProdotto = new Product(
    'Prodotto per Gatti', 
    9.99, 
    'https://www.google.com/imgres?q=gatto&imgurl=https%3A%2F%2Fwww.robinsonpetshop.it%2Fnews%2Fcms2017%2Fwp-content%2Fuploads%2F2022%2F07%2Fgatto-vita.jpg&imgrefurl=https%3A%2F%2Fwww.robinsonpetshop.it%2Fnews%2Fgatto%2Fle-fasi-di-vita-del-gatto-domestico%2F&docid=OW_oKL0k_c2QrM&tbnid=uvlx_6LZTFAkjM&vet=12ahUKEwjv5bvRp4aJAxXogf0HHZeiLC0QM3oECFAQAA..i&w=800&h=400&hcb=2&ved=2ahUKEwjv5bvRp4aJAxXogf0HHZeiLC0QM3oECFAQAA',
    $gatti);

$caniProdotto = new Product(
    'Prodotto per Cani', 
    9.59, 
    'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.purinashop.it%2Fblog%2Fcuriosita-cani&psig=AOvVaw0gAtqbX0bOn9hlolYylmeO&ust=1728735853285000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCJiio52phokDFQAAAAAdAAAAABAE',
    $cani);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP 2</title>
</head>
<body>
    
</body>
</html>