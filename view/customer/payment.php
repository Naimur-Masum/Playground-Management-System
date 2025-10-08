<?php
require_once("../../controller/PaymentController.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="sidebar">
    <h2>Customer Panel</h2>
    <a href="activities.php">Activities</a>
    <a href="booking.php">Bookings</a>
    <a href="payment.php" style="color:sandybrown;">Payments</a>
    <a href="../logout.php">Logout</a>
</div>

<div class="main">
    <h1>Make Payment</h1>

    <?php if (isset($_GET['message'])) { ?>
        <p style="color:green;"><?php echo $_GET['message']; ?></p>
    <?php } elseif (isset($_GET['error'])) { ?>
        <p style="color:red;"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <h2>Pending Payments</h2>
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Activity ID</th>
                <th>Booking Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pending as $p) { ?>
                <tr>
                    <td><?php echo $p['booking_id']; ?></td>
                    <td><?php echo $p['activity_id']; ?></td>
                    <td><?php echo $p['booking_date']; ?></td>
                    <td>
                        <form method="POST" action="../../controller/PaymentController.php">
                            <input type="hidden" name="booking_id" value="<?php echo $p['booking_id']; ?>">
                            <input type="hidden" name="activity_id" value="<?php echo $p['activity_id']; ?>">
                            <input type="submit" name="pay_now" value="Pay Now">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Payment History</h2>
    <table>
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Booking ID</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payments as $p) { ?>
                <tr>
                    <td><?php echo $p['payment_id']; ?></td>
                    <td><?php echo $p['booking_id']; ?></td>
                    <td><?php echo $p['amount']; ?></td>
                    <td><?php echo $p['payment_status']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
