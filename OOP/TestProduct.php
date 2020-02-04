<?php
include 'Product.cls.php';

$p1 = new Product( "Mouse", 10, 40);
$p2 = new Product( "Keyboard", 5, 15);
$p3 = new Product( "Sound Card", 40, 10);
$p4 = new Product("LCD Screen",110,8);
$listofProduct[0]=$p1;
$listofProduct[1]=$p2;
$listofProduct[2]=$p3;
$listofProduct[3]=$p4;

displayProducts($listofProduct);

function displayProducts($list) {
    Product::heading();
    foreach ($list as $oneProduct)
    {
        echo $oneProduct;
    }
    Product::footer();
    
}


//after overloading
$p1->setPrice(25);
$p2->setPrice('p',0.30);
echo "</br>----After changing the price----</br>";
displayProducts($listofProduct);
?>