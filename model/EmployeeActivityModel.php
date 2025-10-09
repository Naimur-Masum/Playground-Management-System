<?php
require_once("database.php");

function getActivitiesByAdmin() {
    $conn = getConnection();
    $sql = "SELECT * FROM activities WHERE created_by = 'admin'";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function updateActivityByEmployee($activity_id, $name, $price, $duration) {
    $conn = getConnection();
    $sql = "UPDATE activities SET name = ?, price = ?, duration = ? WHERE activity_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sdsi", $name, $price, $duration, $activity_id);
    return mysqli_stmt_execute($stmt);
}
?>
