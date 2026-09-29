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



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $product = new Product($_POST['productName'] ?? '', (float) ($_POST['productPrice'] ?? 0));
    $userType = new UserType($_POST['clientType'] ?? '');
    $user = new User('', '', $userType);
    $order = new Order($user, $product, (int) ($_POST['quantity'] ?? 0));
    $orderCalculator = new OrderCalculator();

    try {
        $resultPrice = $orderCalculator->calculateTotalPrice($order);
    } catch (InvalidArgumentException $e) {
        $error = $e->getMessage();
    }
}

require __DIR__ . '/../templates/order.php';
