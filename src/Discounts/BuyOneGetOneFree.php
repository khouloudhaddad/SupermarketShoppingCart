<?php

namespace Supermarket\Discounts;

use Supermarket\BasketItem;

class BuyOneGetOneFree implements DiscountInterface
{
    private string $productName;

    /**
     * BuyOneGetOneFree constructor.
     *
     * @param string $productName The name of the product to apply the discount to.
     */
    public function __construct(string $productName)
    {
        $this->productName = $productName;
    }

    /**
     * Apply the "Buy One Get One Free" discount.
     *
     * @param BasketItem[] $items
     * @return float
     */
    public function apply(array $items): float
    {
        $discount = 0.0;

        foreach ($items as $item) {
            if ($item->getProduct()->getName() === $this->productName) {
                $quantity = floor($item->getQuantity() / 2);
                $discount += $quantity * $item->getProduct()->getPricePerUnit();
            }
        }

        return $discount;
    }
}
