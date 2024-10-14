<?php

trait Discountable {
    public function applyDiscount(float $discount) {
        if ($discount < 0 || $discount > 100) {
            throw new Exception("Il valore di sconto deve essere compreso tra 0 e 100.");
        }
        $this->price -= $this->price * ($discount / 100);
    }
}


class Category {

    public $name;

    function __construct(string $name) {
        $this->name = $name;
    }

}

class Product {
    use Discountable;

    public $title;
    public $price;
    public $img;
    protected $category;

    function __construct(string $title, float $price, string $img, ?Category $category) {
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

    function __construct(string $title, float $price, string $img, ?Category $category, string $ingredient = null) {
        parent::__construct($title, $price, $img, $category);
        $this->ingredient = $ingredient;
    }
}



class Toy extends Product {
    public $material;
    
    function __construct(string $title, float $price, string $img, ?Category $category, string $material = null) {
        parent::__construct($title, $price, $img, $category);
        $this->material = $material;
    }
}

class PetBed extends Product {
    public $size;
    
    function __construct(string $title, float $price, string $img, ?Category $category, string $size = null) {
        parent::__construct($title, $price, $img, $category);
        $this->size = $size;
    }
}

$gatti = new Category('Gatti');
$cani = new Category('Cani');

try {
    $ciboPerCani = new Food('Croccantini per Cani', 10.59, 'https://...', $cani, 'Croccantini');
    $ciboPerCani->applyDiscount(110);
} catch (Exception $e) {
    echo "Errore: " . $e->getMessage();
}

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

$ciboPerCani = new Food(
    'Croccantini per Cani', 
    10.59, 
    'https://www.google.com/url?sa=i&url=https%3A%2F%2Fraggiodisole.biz%2Fretail%2Fproduct%2Fotto-mix%2F&psig=AOvVaw3kOUR67Af3gZ_pEzZzH3GR&ust=1728736660881000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCNC-rZ6shokDFQAAAAAdAAAAABAE',
    $cani,
    'Croccantini');

$giochiPerCani = new Toy(
    'Osso di Gomma per Cani', 
    15.79, 
    'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.pet-store.it%2Faqpetfriends-giochi-per-cani-strong-osso-in-gomma&psig=AOvVaw0xSxlsY3PGj81SYgNgmQdD&ust=1728736684216000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCIDUxK6shokDFQAAAAAdAAAAABAE',
    $cani,
    'Gomma');

$cucciaPerCani = new PetBed(
    'Lettino per Cani', 
    30.99, 
    'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.xlab.design%2Farredamento%2Feco-design-e-riutilizzo%2Flettino-per-cani-milo-vintage%2F&psig=AOvVaw0aS8cW0GnDO_USItwkrXs-&ust=1728736717186000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCOD927qshokDFQAAAAAdAAAAABAE',
    $cani,
    'S');

$ciboPerGatti = new Food(
    'Croccantini per gatti', 
    10.59, 
    'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.animalhouseitalia.it%2Fcibo-per-gatti-senior-o-sterilizzati%2F6449-trainer-natural-adult-sterilised-con-salmone-gr300-croccantini-gatto-8059149029825.html&psig=AOvVaw1cL7Ml5g3xhAoRq8g0N_Pi&ust=1728736909565000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCKDgv5OthokDFQAAAAAdAAAAABAE',
    $gatti,
    'Croccantini');

$giochiPerGatti = new Toy(
    'Giocattolo per gatti', 
    15.79, 
    'https://www.google.com/url?sa=i&url=https%3A%2F%2Fcroci.net%2Fproducts%2Fgioco-per-gatti-bacchetta-provence&psig=AOvVaw1npMtdU_Wu428y6QCTISsN&ust=1728736943802000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCNjxi6WthokDFQAAAAAdAAAAABAE',
    $gatti,
    'Legno, Plastica, Gomma');

$cucciaPerGatti = new PetBed(
    'Lettino per gatti', 
    30.99, 
    'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.sleepypets.it%2Fcucce-personalizzate-per-gatto%2F121-lettino-personalizzato-per-gatto-gliblack.html&psig=AOvVaw0R3YWotQNLfEdSPorux9e-&ust=1728736995995000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCJiJyL-thokDFQAAAAAdAAAAABAE',
    $gatti,
    'M');

$products = [
    $gattiProdotto,
    $caniProdotto,
    $ciboPerCani,
    $giochiPerCani,
    $cucciaPerCani,
    $ciboPerGatti,
    $giochiPerGatti,
    $cucciaPerGatti
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP 2</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <main>
        <div class="container">
            <div class="row g-3">
                <?php
                    foreach($products as $product) {
                    
                ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <img src="<?php echo $product->img; ?>" class="card-img-top" alt="<?php echo $product->title; ?>">
                            <div class="card-body">
                                <h2>
                                    <?php echo $product->title;?>
                                </h2>
                                <h6>
                                    <i class="fa-solid fa-tag"></i>
                                    <?php echo $product->getCategory()->name;?>
                                </h6>
                                <h5>
                                    €<?php echo number_format($product->price, 2, ',', '.'); ?>
                                </h5>
                                <hr>
                                <h3>
                                    Articolo: <?php echo get_class($product);?>
                                </h3>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </main>
    
</body>
</html>