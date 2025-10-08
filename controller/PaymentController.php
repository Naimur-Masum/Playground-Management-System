<?php
require_once(__DIR__ . '/../model/PaymentModel.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit;
}

$customer_id = $_SESSION['user_id'];

if (isset($_POST['pay_now'])) {
    $booking_id = $_POST['booking_id'];
    $activity_id = $_POST['activity_id'];
    $amount = getActivityPrice($activity_id);
    if (addPayment($booking_id, $amount)) {
        header("Location: ../view/customer/payment.php?message=Payment successful");
        exit;
    } else {
        header("Location: ../view/customer/payment.php?error=Payment failed");
        exit;
    }
}

$pending = getBookingForPayment($customer_id);
$payments = getAllPayments($customer_id);
?>
