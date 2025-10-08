<?php
require_once(__DIR__ . '/../model/EmployeeBookingModel.php');
session_start();

if (!isset($_SESSION['user_id']) && !isset($_SESSION['employee_id']) || $_SESSION['role'] != 'employee') {
    header("Location: ../login.php");
    exit;
}

$employee_id = $_SESSION['employee_id'] ?? $_SESSION['user_id'] ?? null;

if (isset($_POST['approve'])) {
    $booking_id = $_POST['booking_id'];
    
    if (approveBooking($booking_id, $employee_id)) {
        header("Location: ../view/employee/approveBooking.php?message=Booking approved");
        exit;
    } else {
        header("Location: ../view/employee/approveBooking.php?error=Approval failed");
        exit;
    }
}

$bookings = getPendingBookings();
?>
