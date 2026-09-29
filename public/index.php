<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/OrderCalculator.php';
require_once __DIR__ . '/../src/DiscountCalculator.php';
require_once __DIR__ . '/../src/Order.php';
require_once __DIR__ . '/../src/Product.php';
require_once __DIR__ . '/../src/User.php';
require_once __DIR__ . '/../src/UserType.php';

$error = null;
$resultPrice = null;

$productName = '';
$productPrice = '';
$quantity = '';
$clientType = 'regular';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        $productName = $_POST['productName'] ?? '';
        $productPrice = (float) ($_POST['productPrice'] ?? '');

        $quantityInput = $_POST['quantity'] ?? '';

        if (filter_var($quantityInput, FILTER_VALIDATE_INT) === false) {
            throw new InvalidArgumentException('Quantity must be an integer');
        }

        $quantity = (int) $quantityInput;
        $clientType = $_POST['clientType'] ?? 'regular';

        $product = new Product($productName, $productPrice);
        $userType = new UserType($clientType);
        $user = new User('', '', $userType);
        $order = new Order($user, $product, $quantity);
        $orderCalculator = new OrderCalculator();
        //   $orderPrice = $orderCalculator->calculateTotalPrice($order);
        //   $order->setTotalPrice($orderPrice);

        $resultPrice = $orderCalculator->calculateTotalPrice($order);

        $order->setTotalPrice($resultPrice);
    } catch (InvalidArgumentException $e) {
        $error = $e->getMessage();
    }
}

require __DIR__ . '/../templates/order.php';
