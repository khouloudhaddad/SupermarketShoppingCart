<?php

namespace Supermarket\Discounts;

use Supermarket\BasketItem;

class GroupDiscount implements DiscountInterface
{
    private string $category;
    private float $discountPercentage;

    /**
     * GroupDiscount constructor.
     *
     * @param string $category The category of products to discount.
     * @param float $discountPercentage The percentage discount to apply (e.g., 0.5 for 50% off).
     */
    public function __construct(string $category, float $discountPercentage)
    {
        $this->category = $category;
        $this->discountPercentage = $discountPercentage;
    }

    /**
     * Apply the group discount to all applicable items.
     *
     * @param BasketItem[] $items
     * @return float
     */
    public function apply(array $items): float
    {
        $discount = 0.0;

        foreach ($items as $item) {
            if ($item->getProduct()->getCategory() === $this->category) {
                $discount += $item->getPrice() * $this->discountPercentage;
            }
        }

        return $discount;
    }
}
