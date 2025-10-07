<?php
require_once("database.php");

function getPendingBookings() {
    $conn = getConnection();
    $sql = "SELECT booking_id, customer_id, activity_id, booking_date FROM bookings WHERE employee_id IS NULL";
    $result = mysqli_query($conn, $sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function approveBooking($booking_id, $employee_id) {
    $conn = getConnection();
    $sql = "UPDATE bookings SET employee_id='$employee_id' WHERE booking_id='$booking_id'";
    return mysqli_query($conn, $sql);
}
?>
