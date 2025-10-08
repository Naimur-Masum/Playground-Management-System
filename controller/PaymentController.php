<?php
require_once("../../model/PaymentModel.php");
session_start();

$customer_id = $_SESSION['customer_id'];

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
