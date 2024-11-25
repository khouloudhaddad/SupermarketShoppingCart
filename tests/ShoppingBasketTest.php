<?php

namespace Supermarket\Tests;

use PHPUnit\Framework\TestCase;
use Supermarket\Product;
use Supermarket\ShoppingBasket;
use Supermarket\Discounts\BuyOneGetOneFree;
use Supermarket\Discounts\GroupDiscount;

class ShoppingBasketTest extends TestCase
{
    public function testCalculateTotalWithoutDiscounts(): void
    {
        $beans = new Product("Baked Beans", "Canned Goods", 0.80);
        $carrots = new Product("Carrots", "Vegetables", 0.50);

        $basket = new ShoppingBasket();
        $basket->addItem($beans, 3); // 3 cans of beans
        $basket->addItem($carrots, 1.5); // 1.5kg of carrots

        $this->assertEquals(3.15, $basket->calculateTotal());
    }

    public function testCalculateTotalWithBuyOneGetOneFree(): void
    {
        $beans = new Product("Baked Beans", "Canned Goods", 0.80);

        $basket = new ShoppingBasket();
        $basket->addItem($beans, 4); // 4 cans of beans

        $basket->addDiscount(new BuyOneGetOneFree("Baked Beans"));

        $this->assertEquals(1.60, $basket->calculateTotal());
    }

    public function testCalculateTotalWithGroupDiscount(): void
    {
        $carrots = new Product("Carrots", "Vegetables", 0.50);

        $basket = new ShoppingBasket();
        $basket->addItem($carrots, 2); // 2kg of carrots

        $basket->addDiscount(new GroupDiscount("Vegetables", 0.5));

        $this->assertEquals(0.50, $basket->calculateTotal());
    }

    public function testCalculateTotalWithMultipleDiscounts(): void
    {
        $beans = new Product("Baked Beans", "Canned Goods", 0.80);
        $carrots = new Product("Carrots", "Vegetables", 0.50);

        $basket = new ShoppingBasket();
        $basket->addItem($beans, 4); // 4 cans of beans
        $basket->addItem($carrots, 2); // 2kg of carrots

        $basket->addDiscount(new BuyOneGetOneFree("Baked Beans"));
        $basket->addDiscount(new GroupDiscount("Vegetables", 0.5));

        $this->assertEquals(2.10, $basket->calculateTotal());
    }
}
