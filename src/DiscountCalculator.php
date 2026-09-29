<?php

declare(strict_types=1);

class DiscountCalculator
{

    private Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function calculateDiscount(): float
    {
        $userType = $this->order->getUser()->getUserType()->getType();
        $orderPrice = new OrderCalculator()->calculateOrderPrice($this->order);

        $totalDiscount = 0.0;

        if ($orderPrice >= 100) {
            $totalDiscount += $this->calculateFloatPrice($orderPrice, 0.05); // 5% discount for bulk orders
        }

        if ($userType === 'premium') {
            $totalDiscount += $this->calculateFloatPrice($orderPrice, 0.1); // 10% discount for premium users
        }

        return $totalDiscount; // Return the total discount
    }

    private function calculateFloatPrice(float $price, float $discount): float
    {
        $intPrice = (int) ($price * 100);
        $intDiscount = (int) ($discount * 100);
        $intFinalPrice = $intPrice * $intDiscount;
        return $intFinalPrice / 100;
    }
}
