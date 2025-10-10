<?php
require_once("../../controller/PaymentController.php");
$error = "";
$success = "";


if (isset($_POST['pay_now'])) {
    $booking_id = $_POST['booking_id'];
    $activity_id = $_POST['activity_id'];
    $amount = getActivityPrice($activity_id);
    $paid = addPayment($booking_id, $amount);

    if ($paid) {
        $success = "Payment successful for Booking ID: $booking_id";
    } 
    else {
        $error = "Payment failed for Booking ID: $booking_id";
    }

    header("Location: payment.php?success=" . urlencode($success) . "&error=" . urlencode($error));
    exit;
}

if (isset($_GET['success'])) {
    $success = $_GET['success'];
}
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>
<div class="sidebar">
        <nav>
            <ul>
                <li><a href="booking    `.php">Make Booking</a></li>
                <u><li><a href="payment.php">My Payments</a></li></u>
                <li><a href="customerDashboard.php">Dashboard</a></li>
            </ul>
        </nav>

        <div class="sidebar-bottom">
            <a href="../logout.php" class="logout-btn">Log out</a>
        </div>
</div>

<div class="content"> 
<section class="pend-payments">
    <h1>Pending Payments</h1>
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
 </section>

<br><br><br>
<section class="payment-history">
    <h1>Payment History</h1>
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
