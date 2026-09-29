<?php

declare(strict_types=1);

class Product
{
    private string $name;
    private float $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
        $this->validatePrice();
    }
    private function validatePrice(): void
    {
        if ($this->price <= 0) {
            throw new InvalidArgumentException('Price cannot be zero or negative');
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
