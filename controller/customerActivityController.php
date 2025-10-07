<?php
session_start();
require_once("../model/CustomerActivityModel.php");

if (!isset($_SESSION['loginEmail']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit;
}

$customer_id = $_SESSION['user_id'] ?? null;
if (!$customer_id) {
    die("Customer not found.");
}

if (isset($_POST['book_activity'])) {
    $activity_id = $_POST['activity_id'];
    $employee_id = $_POST['employee_id'] ?? null;
    $booking_date = $_POST['booking_date'];

    $booked = addBooking($customer_id, $activity_id, $employee_id, $booking_date);

    if ($booked) {
        $booking_id = mysqli_insert_id(getConnection());
        header("Location: ../view/customer/payment.php?booking_id=$booking_id");
        exit;
    }
    else {
    
        $error = "Failed to book activity.";
    }
}

$activities = getAllActivities();
?>
