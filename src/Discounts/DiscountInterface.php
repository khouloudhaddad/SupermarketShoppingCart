<?php

namespace Supermarket\Discounts;

use Supermarket\BasketItem;

interface DiscountInterface
{
    /**
     * Apply the discount to a list of basket items.
     *
     * @param BasketItem[] $items
     * @return float The total discount amount.
     */
    public function apply(array $items): float;
}
