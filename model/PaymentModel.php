<?php
require_once("database.php");

function getBookingForPayment($customer_id) {
    $conn = getConnection();
    $sql = "SELECT booking_id, activity_id, booking_date 
            FROM bookings 
            WHERE customer_id='$customer_id' 
            AND booking_id NOT IN (SELECT booking_id FROM payments)";
    $result = mysqli_query($conn, $sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getActivityPrice($activity_id) {
    $conn = getConnection();
    $sql = "SELECT price FROM activities WHERE activity_id='$activity_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['price'];
}

function addPayment($booking_id, $amount) {
    $conn = getConnection();
    $sql = "INSERT INTO payments(booking_id, amount, payment_status) 
            VALUES('$booking_id', '$amount', 'paid')";
    return mysqli_query($conn, $sql);
}

function getAllPayments($customer_id) {
    $conn = getConnection();
    $sql = "SELECT payments.payment_id, payments.booking_id, payments.amount, payments.payment_status 
            FROM payments 
            JOIN bookings ON payments.booking_id = bookings.booking_id 
            WHERE bookings.customer_id = '$customer_id'";
    $result = mysqli_query($conn, $sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
