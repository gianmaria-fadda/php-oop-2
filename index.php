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

$gatti = new Category('Gatti');
$cani = new Category('Cani');

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