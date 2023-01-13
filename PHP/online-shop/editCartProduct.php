<?php

define('BASE_PATH', './');
require_once('./logic/products.php');
require_once('./logic/cart.php');
if (isset($_GET['id'])) {
    $product = getProductById($_GET['id']);
    $comm = $_GET['comm'];
    if ($product) {
        switch($comm){
            case 1 : decQun($product);break;
            case 2 : incQun($product);break;
            case 3 : removeProduct($product);break;
            }
        }
    }
header('Location:cart.php');

?>