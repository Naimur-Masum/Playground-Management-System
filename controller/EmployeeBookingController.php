<?php
require_once("../../model/EmployeeBookingModel.php");
session_start();

if (isset($_POST['approve'])) {
    $booking_id = $_POST['booking_id'];
    $employee_id = $_SESSION['employee_id'];
    if (approveBooking($booking_id, $employee_id)) {
        header("Location: ../view/employee/approveBooking.php?message=Booking approved");
        exit;
    }
    else {
        header("Location: ../view/employee/approveBooking.php?error=Approval failed");
        exit;
    }
}

$bookings = getPendingBookings();
?>
