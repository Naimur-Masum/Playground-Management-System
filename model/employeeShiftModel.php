<?php
require_once("database.php");

function clockIn($employee_id) {
    $conn = getConnection();

    $sql_check = "SELECT * FROM employee_workshifts WHERE employee_id = $employee_id AND check_out IS NULL";
    $result = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result) > 0) {
        return false;
    }

    $sql = "INSERT INTO employee_workshifts(employee_id) VALUES($employee_id)";
    return mysqli_query($conn, $sql);
}

function clockOut($employee_id) {
    $conn = getConnection();

    $sql = "SELECT * FROM employee_workshifts WHERE employee_id = $employee_id AND check_out IS NULL ORDER BY check_in DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        return false;
    }

    $sql_update = "UPDATE employee_workshifts SET check_out = NOW() WHERE employee_id = $employee_id AND check_out IS NULL ORDER BY check_in DESC LIMIT 1";
    return mysqli_query($conn, $sql_update);
}

function getShifts($employee_id) {
    $conn = getConnection();
    $sql = "SELECT * FROM employee_workshifts WHERE employee_id = $employee_id ORDER BY check_in DESC";
    $result = mysqli_query($conn, $sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>!
