<?php
define('BASE_PATH', './');
require_once('./logic/products.php');
require_once('./logic/cart.php');
$cart = getCart();
if (isset($_GET['id'])) {
    $product = getProductById($_GET['id']);
    if ($product) {
        $found = false;
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['product']['id'] === $product['id']) {
                $cart[$i]['quantity'] ++;
                $found = true;
            }
        }
        if (!$found) {
            array_push($cart, ['product' => $product, 'quantity' => 1]);
        }
        $_SESSION['cart'] = $cart;
    }
}
header('Location:cart.php');
?>