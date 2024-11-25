<?php

namespace Supermarket;

class Product
{
    private string $name;
    private string $category;
    private float $pricePerUnit;

    /**
     * Product constructor.
     * 
     * @param string $name The name of the product.
     * @param string $category The category of the product.
     * @param float $pricePerUnit The price per unit of the product.
     */
    public function __construct(string $name, string $category, float $pricePerUnit)
    {
        $this->name = $name;
        $this->category = $category;
        $this->pricePerUnit = $pricePerUnit;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getPricePerUnit(): float
    {
        return $this->pricePerUnit;
    }
}
