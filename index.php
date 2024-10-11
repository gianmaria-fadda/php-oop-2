<?php

class Category {

    public $name;
    public $icon;

}

class Product {

    public $title;
    public $price;
    public $img;
    protected $category;

    function __construct(Category $category) {
        $this->setCategory($category);
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory(Category $category) {
        $this->category = $category;
    }

}

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