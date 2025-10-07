<?php
require_once("database.php");

function getShiftsByEmployee($employee_id) {
    $conn = getConnection();
    $sql = "SELECT * FROM employee_workshifts WHERE employee_id = $employee_id ORDER BY shift_id DESC";
    $result = mysqli_query($conn, $sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function clockIn($employee_id) {
    $conn = getConnection();
    $sql = "INSERT INTO employee_workshifts (employee_id) VALUES ($employee_id)";
    return mysqli_query($conn, $sql);
}

function clockOut($shift_id) {
    $conn = getConnection();
    $sql = "UPDATE employee_workshifts SET check_out = NOW() WHERE shift_id = $shift_id";
    return mysqli_query($conn, $sql);
}

function getLatestShift($employee_id) {
    $conn = getConnection();
    $sql = "SELECT * FROM employee_workshifts WHERE employee_id = $employee_id ORDER BY shift_id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}
?>
