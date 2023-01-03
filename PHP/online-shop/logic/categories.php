<?php
function getCategories()
{
    $categories = [
        [
            'id' => 1,
            'name' => 'Clothes',
            'image' => 'img/cat-1.jpg',
            'product_count' => 100,
            'image_url' => 'img/cat-1.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Electronics',
            'image' => 'img/cat-2.jpg',
            'product_count' => 100,
            'image_url' => 'img/cat-2.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Shoes',
            'image' => 'img/cat-3.jpg',
            'product_count' => 100,
            'image_url' => 'img/cat-3.jpg'
        ],
        [
            'id' => 4,
            'name' => 'Cosmotics',
            'image' => 'img/cat-4.jpg',
            'product_count' => 100,
            'image_url' => 'img/cat-4.jpg'
        ],
    ];
    return $categories;
}