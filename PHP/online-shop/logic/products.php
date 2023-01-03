<?php
function getProducts(){
    $products = [
        ['name' => 'Product1', 'image_url' => 'img/product-1.jpg', 'price' => 100,'discount'=>0.1,'rating'=>0,'rating_count'=>100,'is_featured'=>true,'is_recent'=>false],
        ['name' => 'Product2', 'image_url' => 'img/product-2.jpg', 'price' => 110,'discount'=>0.125,'rating'=>1,'rating_count'=>90,'is_featured'=>true,'is_recent'=>false],
        ['name' => 'Product3', 'image_url' => 'img/product-3.jpg', 'price' => 120,'discount'=>0.2,'rating'=>1.5,'rating_count'=>95,'is_featured'=>true,'is_recent'=>false],
        ['name' => 'Product4', 'image_url' => 'img/product-4.jpg', 'price' => 130,'discount'=>0.1,'rating'=>4.5,'rating_count'=>100,'is_featured'=>true,'is_recent'=>false],
        ['name' => 'Product5', 'image_url' => 'img/product-5.jpg', 'price' => 140,'discount'=>0.1,'rating'=>3.5,'rating_count'=>97,'is_featured'=>false,'is_recent'=>true],
        ['name' => 'Product6', 'image_url' => 'img/product-6.jpg', 'price' => 150,'discount'=>0.2,'rating'=>3,'rating_count'=>99,'is_featured'=>false,'is_recent'=>true],
        ['name' => 'Product2', 'image_url' => 'img/product-2.jpg', 'price' => 160,'discount'=>0.3,'rating'=>4,'rating_count'=>98,'is_featured'=>false,'is_recent'=>true],
        ['name' => 'Product1', 'image_url' => 'img/product-1.jpg', 'price' => 170,'discount'=>0.2,'rating'=>5,'rating_count'=>99,'is_featured'=>false,'is_recent'=>true],
    ];
    return $products;
}
function setStars($product)
{
    $rate = $product['rating'];
    $output = '';
    for ($i = 1; $i <= 5;$i++){
        if ($i <=$rate) $output .= '<small class="fa fa-star text-primary mr-1"></small>';
        else if ($i <= $rate + 0.5) $output .= '<small class="fa fa-star-half-alt text-primary mr-1"></small>';
        else $output .= '<small class="far fa-star text-primary mr-1"></small>';
    }
    return $output;
}

function display_product($product)
{
    return '<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
    <div class="product-item bg-light mb-4">
        <div class="product-img position-relative overflow-hidden">
            <img class="img-fluid w-100" src="' . $product['image_url'] . '" alt="" />
            <div class="product-action">
                <a class="btn btn-outline-dark btn-square" href="#"><i class="fa fa-shopping-cart"></i></a>
                <a class="btn btn-outline-dark btn-square" href="#"><i class="far fa-heart"></i></a>
                <a class="btn btn-outline-dark btn-square" href="#"><i class="fa fa-sync-alt"></i></a>
                <a class="btn btn-outline-dark btn-square" href="#"><i class="fa fa-search"></i></a>
            </div>
        </div>
        <div class="text-center py-4">
            <a class="h6 text-decoration-none text-truncate" href="">' . $product['name'] . '</a>
            <div class="d-flex align-items-center justify-content-center mt-2">
                <h5>$' . ($product['price'] - ($product['price'] * $product['discount'])) . '</h5>
                <h6 class="text-muted ml-2"><del>$' . $product['price'] . '</del></h6>
            </div>
            <div class="d-flex align-items-center justify-content-center mb-1">
                '.setStars($product).'
                <small>(' . $product['rating_count'] . ')</small>
            </div>
        </div>
    </div>
</div>';
}