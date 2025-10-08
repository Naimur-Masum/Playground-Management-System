<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'customer') {
    header("Location: ../../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="sidebar">
    <h2>Customer Panel</h2>
    <a href="activities.php">Activities</a>
    <a href="booking.php">Bookings</a>
    <a href="payment.php">Payments</a>
    <a href="../logout.php">Logout</a>
</div>

<div class="main">
    <h1>Welcome, <?php echo $_SESSION['full_name']; ?></h1>
    <p>From here, you can manage your activities, view your bookings, and make payments.</p>

    <div class="dashboard-options">
        <a href="activities.php" class="dash-btn">View Activities</a>
        <a href="booking.php" class="dash-btn">My Bookings</a>
        <a href="payment.php" class="dash-btn">Make Payments</a>
    </div>
</div>
</body>
</html>
