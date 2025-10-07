<?php
require_once("../../controller/CustomerBookingController.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book an Activity</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Available Activities</h1>

<?php if($error) { echo "<p style='color:red;'>$error</p>"; } ?>
<?php if($success) { echo "<p style='color:green;'>$success</p>"; } ?>

<form action="" method="POST">
    <label for="activity">Activity:</label>
    <select name="activity_id" required>
        <?php foreach($activities as $act) { ?>
            <option value="<?php echo $act['activity_id']; ?>">
                <?php echo $act['name'] . " - $" . $act['price']; ?>
            </option>
        <?php } ?>
    </select><br>

    <label for="booking_date">Booking Date:</label>
    <input type="date" name="booking_date" required><br>

    <input type="submit" name="book_activity" value="Book Activity">
</form>
</body>
</html>
