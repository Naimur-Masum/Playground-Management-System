<?php
require_once("database.php");

function clockIn($employee_id) {
    $conn = getConnection();
    $sql = "INSERT INTO employee_workshifts (employee_id, check_in) VALUES ('$employee_id', NOW())";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function clockOut($shift_id) {
    $conn = getConnection();
    $sql = "UPDATE employee_workshifts SET check_out = NOW() WHERE shift_id = '$shift_id'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getLatestShift($employee_id) {
    $conn = getConnection();
    $sql = "SELECT * FROM employee_workshifts WHERE employee_id = '$employee_id' ORDER BY shift_id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function getShiftsByEmployee($employee_id) {
    $conn = getConnection();
    $sql = "SELECT *, 
            ROUND(TIMESTAMPDIFF(MINUTE, check_in, check_out)/60, 2) AS total_hours 
            FROM employee_workshifts 
            WHERE employee_id = '$employee_id' 
            ORDER BY shift_id DESC";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        return [];
    }
}
?>
