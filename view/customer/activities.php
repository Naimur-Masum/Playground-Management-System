<?php
require_once("../../controller/CustomerActivityController.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choose Activity</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Available Activities</h2>

    <?php if (!empty($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="../../controller/CustomerActivityController.php">
        <label>Activity:</label>
        <select name="activity_id" required>
            <?php foreach ($activities as $activity) { ?>
                <option value="<?php echo $activity['activity_id']; ?>">
                    <?php echo $activity['name'] . " - $" . $activity['price']; ?>
                </option>
            <?php } ?>
        </select>
        <br><br>

        <label>Booking Date:</label>
        <input type="date" name="booking_date" required>
        <br><br>

        <input type="submit" name="book_activity" value="Book Activity">
    </form>
</body>
</html>
