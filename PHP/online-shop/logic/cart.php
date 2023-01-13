<?php
require_once(BASE_PATH . 'dal/dal.php');


function getCart()
{
    if (session_status() === PHP_SESSION_NONE)
        session_start();

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    return $cart;
}

function decQun($product)
{
    $cart = getCart();
    $i = 0;
    foreach ($cart as $c) {
        if ($c['product']['id'] === $product['id']) {
            if ($c['quantity'] > 1)
            $cart[$i]['quantity']=$c['quantity']-1;
        }
        $i++;
    }
    $_SESSION['cart'] = $cart;
}
function incQun($product)
{
    $cart = getCart();
    $i = 0;
    foreach ($cart as $c) {
        if ($c['product']['id'] === $product['id']) {
            $cart[$i]['quantity']++;
        }
        $i++;
    }
    $_SESSION['cart'] = $cart;
}
function removeProduct($product)
{
    $cart = getCart();
    $i=0;
    foreach ($cart as $c) {
        if ($c['product']['id'] === $product['id']) {
            unset($cart[$i]);
            $cart=array_values($cart);
        }
        $i++;
    }
    $_SESSION['cart'] = $cart;
}
function getSubTotal()
{
    $cart = getCart();
    $subtotal = 0;
    foreach ($cart as $c) {
        $subtotal += $c['quantity'] * ($c['product']['price'] * (1 - $c['product']['discount']));
    }
    return $subtotal;
}

function getShipping()
{
    $cart = getCart();
    $shipping = 0;
     foreach ($cart as $c) {
        $shipping += $c['quantity'] * 10;
    }
    return $shipping;
}
function getTotal()
{
    return getShipping() + getSubTotal();
}