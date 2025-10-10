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
    <link rel="stylesheet" href="../../assets/css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <section class="header">
        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="booking.php">Make Booking</a></li>
                    <li><a href="payment.php">My Payments</a></li>
                    <li class="logout"><a href="../logout.php">Log out</a></li>
                </ul>
            </div>
        </nav>

        <div class="text-box">
            <h1>Welcome back, <?php echo $_SESSION['full_name']; ?> </h1>
            <p>Discover SafeZone Playground — a trusted spot for fun, socializing, and enjoying <br> memorable experiences with friends and family.</p>
            <a href="booking.php" class="hero-btn">Book An Activity</a>
        </div>
    </section>

    <section class="activities">
        <h1>Activities We Offer</h1>
        <div class="row">
            <div class="activities-col">
                <img src="../../assets/basketball.jpg">
                <h3>Basketball</h3>
                <p>Shoot, pass, and dribble in fast-paced games that boost teamwork and energy</p>
            </div>
            <div class="activities-col">
                <img src="../../assets/pool.jpg">
                <h3>Swimming</h3>
                <p>Dive in and enjoy a refreshing, safe, and invigorating swimming experience.</p>
            </div>
            <div class="activities-col">
                <img src="../../assets/badminton.jpg">
                <h3>Badminton</h3>
                <p>Smash, serve, and rally in fun matches that improve agility and focus.</p>
            </div>
            <div class="activities-col">
                <img src="../../assets/Football.jpg">
                <h3>Football</h3>
                <p>Score goals and play thrilling matches that strengthen teamwork and fitness.</p>
            </div>
        </div>
    </section>
</body>
</html>
