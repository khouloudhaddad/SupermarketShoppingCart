<?php

require_once 'vendor/autoload.php';

use Supermarket\Product;
use Supermarket\ShoppingBasket;
use Supermarket\Discounts\BuyOneGetOneFree;
use Supermarket\Discounts\GroupDiscount;

// Create products
$beans = new Product("Baked Beans", "Canned Goods", 0.80);
$carrots = new Product("Carrots", "Vegetables", 0.50);

// Create a shopping basket
$basket = new ShoppingBasket();
$basket->addItem($beans, 3);
$basket->addItem($carrots, 1.5);

// Apply discounts
$basket->addDiscount(new BuyOneGetOneFree("Baked Beans"));
$basket->addDiscount(new GroupDiscount("Vegetables", 0.5));

// Output total
echo "Total: $" . number_format($basket->calculateTotal(), 2);
