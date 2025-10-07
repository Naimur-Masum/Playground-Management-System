<?php
require_once("../model/employeeShiftModel.php");
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'employee'){
    header("Location: ../login.php");
    exit;
}

$employee_id = $_SESSION['user_id'];


if (isset($_POST['clock_in'])){
    if (clockIn($employee_id)){
        $message = "Clocked in successfully!";
    } 
    else
    {
        $message = "Already clocked in!";
    }
    header("Location: ../view/employee/shift.php?message=".urlencode($message));
    exit;
}


if (isset($_POST['clock_out'])){
    if (clockOut($employee_id)){
        $message = "Clocked out successfully!";
    }
    else 
    {
        $message = "No active shift to clock out!";
    }
    header("Location: ../view/employee/shift.php?message=".urlencode($message));
    exit;
}


$shifts = getShifts($employee_id);
?>

