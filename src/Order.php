<?php

declare(strict_types=1);

class Order
{

    private User $user;
    private Product $product;
    private int $quantity;

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

        if ($this->quantity % 1 !== 0) {
            throw new InvalidArgumentException('Quantity must be an integer');
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
}
