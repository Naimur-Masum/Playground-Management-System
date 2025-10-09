<?php
require_once(__DIR__ . '/../model/EmployeeActivityModel.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'employee') {
    header("Location: ../login.php");
    exit;
}

$activities = getActivitiesByAdmin();

if (isset($_POST['update'])) {
    $activity_id = $_POST['activity_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];

    if (updateActivityByEmployee($activity_id, $name, $price, $duration)) {
        header("Location: ../view/employee/activities.php?status=updated");
        exit;
    } 
    else {
        header("Location: ../view/employee/activities.php?error=update_failed");
        exit;
    }
}
?>
