<?php

declare(strict_types=1);

class Order
{

    private User $user;
    private Product $product;
    private int $quantity;
    private float $totalPrice = 0.0;

    public function __construct(User $user, Product $product, int $quantity)
    {
        $this->user = $user;
        $this->product = $product;
        $this->quantity = $quantity;
        $this->validateQuantity();
    }

    private function validateQuantity(): void
    {
        if ($this->quantity <= 0) {
            throw new InvalidArgumentException('Quantity cannot be zero or negative');
        }
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }
}
