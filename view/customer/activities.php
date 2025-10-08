<?php
require_once("../../controller/CustomerBookingController.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choose Activity</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <h2>Customer Panel</h2>
        <a href="activities.php" style="color:sandybrown">Activities</a>
        <a href="../logout.php">Logout</a>
    </div>

    <div class="main">
        <h1>Available Activities</h1>

        <?php if (isset($_GET['message'])) { ?>
            <p style="color:green;"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php } ?>

        <form method="POST" action="../../controller/CustomerBookingController.php">
            <label for="activity">Activity:</label>
            <select name="activity_id" required>
                <?php foreach ($activities as $act) { ?>
                    <option value="<?php echo $act['activity_id']; ?>">
                        <?php echo htmlspecialchars($act['name']) . " - $" . htmlspecialchars($act['price']); ?>
                    </option>
                <?php } ?>
            </select><br><br>

            <label for="booking_date">Booking Date:</label>
            <input type="date" name="booking_date" required><br><br>

            <input type="submit" name="book_activity" value="Book Activity">
        </form>
    </div>
</body>
</html>
