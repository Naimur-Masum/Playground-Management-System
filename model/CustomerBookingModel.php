<?php
require_once("database.php");

function getAllActivities() {
    $conn = getConnection();
    $sql = "SELECT activity_id, name, price FROM activities";
    $result = mysqli_query($conn, $sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addBooking($customer_id, $activity_id, $employee_id = null, $booking_date) {
    $conn = getConnection();
    
    if ($employee_id === null) {
        $sql = "INSERT INTO bookings(customer_id, activity_id, employee_id, booking_date)
                VALUES('$customer_id', '$activity_id', NULL, '$booking_date')";
    } else {
        $sql = "INSERT INTO bookings(customer_id, activity_id, employee_id, booking_date)
                VALUES('$customer_id', '$activity_id', '$employee_id', '$booking_date')";
    }
    
    if(mysqli_query($conn, $sql)){
        return mysqli_insert_id($conn);
    } 
    else {
        return false;
    }

    return mysqli_query($conn, $sql);
}


function getBookingById($booking_id) {
    $conn = getConnection();
    $sql = "SELECT * FROM bookings WHERE booking_id='$booking_id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function addPayment($booking_id, $amount) {
    $conn = getConnection();
    $sql = "INSERT INTO payments(booking_id, amount, payment_status) 
            VALUES('$booking_id', '$amount', 'paid')";
    return mysqli_query($conn, $sql);
}

function getActivityPrice($activity_id) {
    $conn = getConnection();
    $sql = "SELECT price FROM activities WHERE activity_id='$activity_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['price'] ?? 0;
}
?>
