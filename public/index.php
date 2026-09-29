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
        $quantity = (int) ($_POST['quantity'] ?? '');
        $clientType = $_POST['clientType'] ?? 'regular';

        $product = new Product($productName, $productPrice);
        $userType = new UserType($clientType);
        $user = new User('', '', $userType);
        $order = new Order($user, $product, $quantity);
        $orderCalculator = new OrderCalculator();

        $resultPrice = $orderCalculator->calculateTotalPrice($order);
    } catch (InvalidArgumentException $e) {
        $error = $e->getMessage();
    }
}

require __DIR__ . '/../templates/order.php';
