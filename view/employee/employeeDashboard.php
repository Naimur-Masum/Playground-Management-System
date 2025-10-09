<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'employee') {
    header("Location: ../../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="sidebar">
    <h2>Employee Panel</h2>
    <a href="shift.php">My Shifts</a>
    <a href="approveBooking.php">Approve Bookings</a>
    <a href="../logout.php">Logout</a>
</div>

<div class="main">
    <h1>Welcome, <?php echo $_SESSION['full_name']; ?></h1>
    <p>Manage your shifts, approve customer bookings, and keep track of assigned activities.</p>

    <div class="dashboard-options">
        <a href="shift.php" class="dash-btn">View Shifts</a>
        <a href="approveBooking.php" class="dash-btn">Approve Bookings</a>
        <a href="activities.php">Manage Activities</a>
    </div>
</div>
</body>
</html>
