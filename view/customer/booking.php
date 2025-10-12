<?php
require_once("../../controller/CustomerBookingController.php");

$error = "";
$success = "";

if (isset($_GET['message'])) {
    $success = $_GET['message'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choose Activity</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
</head>
<body>
<section class="bg-header">
    <div class="sidebar">
        <nav>
            <ul>
                <u><li><a href="booking.php">Make Booking</a></li></u>
                <li><a href="payment.php">My Payments</a></li>
                <li><a href="customerDashboard.php">Dashboard</a></li>
            </ul>
        </nav>

        <div class="sidebar-bottom">
            <a href="../logout.php" class="logout-btn">Log out</a>
        </div>
    </div>

    <div class="content">
        <?php if (isset($_GET['message'])) { ?>
            <p class="success-message"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php } ?>

        <form method="POST" action="../../controller/CustomerBookingController.php">
            <section class="select-activity">
                <h1>Select Activity</h1>
                <div class="activity-selection">
                    <?php foreach ($activities as $act) { ?>
                        <label class="activity-card">
                            <input type="radio" name="activity_id" value="<?php echo $act['activity_id']; ?>" required>
                            <h4><?php echo htmlspecialchars($act['name']); ?></h4>
                            <p>$<?php echo htmlspecialchars($act['price']); ?></p>
                        </label>
                    <?php } ?>
                </div>
            </section>

            <br><br><br>

            <section class="select-time">
                <h1>Select Booking Date</h1>
                <label for="booking_date"></label>
                <input type="date" name="booking_date" required>
            </section>

            <br><br><br><br>
            <input type="submit" name="book_activity" value="Book Activity" class="btn-submit">
        </form>
    </div>
    </section>
</body>
</html>
