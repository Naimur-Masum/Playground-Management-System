<?php
require_once("../../controller/EmployeeBookingController.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Approve Bookings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="sidebar">
    <h2>Employee Panel</h2>
    <a href="shift.php">Shifts</a>
    <a href="approveBooking.php" style="color:sandybrown;">Approve Bookings</a>
    <a href="../logout.php">Logout</a>
</div>

<div class="main">
    <div class="header">
        <h1>Approve Customer Bookings</h1>
    </div>

    <?php if (isset($_GET['message'])) { ?>
        <p style="color:green;"><?php echo $_GET['message']; ?></p>
    <?php } elseif (isset($_GET['error'])) { ?>
        <p style="color:red;"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Customer ID</th>
                <th>Activity ID</th>
                <th>Booking Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $b) { ?>
                <tr>
                    <td><?php echo $b['booking_id']; ?></td>
                    <td><?php echo $b['customer_id']; ?></td>
                    <td><?php echo $b['activity_id']; ?></td>
                    <td><?php echo $b['booking_date']; ?></td>
                    <td>
                        <form method="POST" action="../../controller/EmployeeBookingController.php">
                            <input type="hidden" name="booking_id" value="<?php echo $b['booking_id']; ?>">
                            <input type="submit" name="approve" value="Approve">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
