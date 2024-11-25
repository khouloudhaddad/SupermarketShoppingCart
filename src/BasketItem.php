<?php

namespace Supermarket;

class BasketItem
{
    private Product $product;
    private float $quantity;

    /**
     * BasketItem constructor.
     * 
     * @param Product $product The product being added to the basket.
     * @param float $quantity The quantity of the product.
     */
    public function __construct(Product $product, float $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * Get the total price for this item based on its quantity.
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->quantity * $this->product->getPricePerUnit();
    }
}
