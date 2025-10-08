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

<div class="main dashboard-container">
    <h1>Welcome, <?php echo $_SESSION['full_name']; ?></h1>
    <p>Explore SafeZone Playground — fun, safe, and loved by our customers!</p>

    <div class="playground-info">
        <div class="playground-card">
            <h2>Play Areas</h2>
            <ul>
                <li>Modern swings, slides, and climbing frames for all ages.</li>
                <li>Clean, safe, and regularly maintained play zones.</li>
                <li>Flexible booking options for weekends, weekdays, and events.</li>
            </ul>
        </div>

        <div class="playground-card">
            <h2>Safety Ratings</h2>
            <p>Our playground is rated 4.9/5 by our customers. Safety is our top priority, ensuring a worry-free experience for kids and parents.</p>
        </div>

        <div class="playground-card">
            <h2>Staff & Supervision</h2>
            <p>Trained attendants monitor all play zones and are available to help children and answer parent inquiries.</p>
        </div>
    </div>
</div>
</body>
</html>
