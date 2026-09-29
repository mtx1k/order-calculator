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

        if ($orderPrice > 100) {
            $totalDiscount += $this->calculateFloatPrice($orderPrice, 5); // 5% discount for bulk orders
        }

        if ($userType === 'premium') {
            $totalDiscount += $this->calculateFloatPrice($orderPrice, 10); // 10% discount for premium users
        }

        return $totalDiscount; // Return the total discount
    }

    private function calculateFloatPrice(float $price, float $discount): float
    {
        $priceCents = (int) round($price * 100);
        $discountCents = (int) round($priceCents * $discount / 100);

        return $discountCents / 100;
    }
}
