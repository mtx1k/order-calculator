<?php

declare(strict_types=1);

class OrderCalculator
{

    public function calculateOrderPrice(Order $order): float
    {
        $price = (int) ($order->getProduct()->getPrice() * 100);
        $quantity = $order->getQuantity();
        $intTotalPrice = $price * $quantity;
        return $intTotalPrice / 100;
    }

    public function calculateTotalPrice(Order $order): float
    {
        $orderPrice = $this->calculateOrderPrice($order);
        $discountCalculator = new DiscountCalculator($order);
        $totalDiscount = $discountCalculator->calculateDiscount();
        return $orderPrice - $totalDiscount;
    }
}
