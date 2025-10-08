<?php
require_once(__DIR__ . '/../model/CustomerBookingModel.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit;
}

$customer_id = $_SESSION['user_id'];

$activities = getAllActivities();

$error = '';
$success = '';

if (isset($_POST['book_activity'])) {
    $activity_id = $_POST['activity_id'];
    $booking_date = $_POST['booking_date'];

    $employee_id = null;

    $booking_id = addBooking($customer_id, $activity_id, $employee_id, $booking_date);

if ($booking_id) {
    $message = "Booking successful! Please proceed to payment.";
    header("Location: ../view/customer/payment.php?booking_id=$booking_id&message=" . urlencode($message));
} 
else {
    $message = "Booking failed!";
    header("Location: ../view/customer/activities.php?message=" . urlencode($message));
}
exit;

}
?>
