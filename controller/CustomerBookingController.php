<?php
require_once("../model/CustomerBookingModel.php");
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit;
}

$customer_id = $_SESSION['user_id'];

$activities = getAllActivities();

if (isset($_POST['book_activity'])) {
    $activity_id = $_POST['activity_id'];
    $booking_date = $_POST['booking_date'];

    $employee_id = null;

    $booked = addBooking($customer_id, $activity_id, $employee_id, $booking_date);

    if ($booked) {
        $booking_id = mysqli_insert_id(getConnection());

        $amount = getActivityPrice($activity_id);

        $paid = addPayment($booking_id, $amount);

        if ($paid) {
            $message = "Booking and payment successful!";
        }
        else {
            $message = "Booking done, but payment failed!";
        }
    }
    else {
        $message = "Booking failed!";
    }

    header("Location: ../view/customer/activities.php?message=" . urlencode($message));
    exit;
}
?>
