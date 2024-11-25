<?php

namespace Supermarket;

use Supermarket\Discounts\DiscountInterface;

class ShoppingBasket
{
    private array $items = [];
    private array $discounts = [];

    /**
     * Add a product to the shopping basket.
     * 
     * @param Product $product The product to add.
     * @param float $quantity The quantity of the product.
     */
    public function addItem(Product $product, float $quantity): void
    {
        $this->items[] = new BasketItem($product, $quantity);
    }

    /**
     * Add a discount to the basket.
     * 
     * @param DiscountInterface $discount The discount to apply.
     */
    public function addDiscount(DiscountInterface $discount): void
    {
        $this->discounts[] = $discount;
    }

    /**
     * Calculate the total cost of the basket, including discounts.
     *
     * @return float
     */
    public function calculateTotal(): float
    {
        $total = array_reduce(
            $this->items,
            fn($sum, $item) => $sum + $item->getPrice(),
            0
        );

        $discountTotal = array_reduce(
            $this->discounts,
            fn($sum, $discount) => $sum + $discount->apply($this->items),
            0
        );

        return $total - $discountTotal;
    }
}
