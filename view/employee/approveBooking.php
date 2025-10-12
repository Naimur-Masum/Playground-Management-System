<?php
require_once("../../controller/EmployeeBookingController.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Approve Bookings</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
<section class="bg-header">
<div class="sidebar">
    <nav>
        <ul>
            <u><li><a href="approveBooking.php">Approve Bookings</a></li></u>
            <li><a href="activities.php">Manage Activities</a></li>
            <li><a href="shift.php">My Shifts</a></li>
            <li><a href="employeeDashboard.php">Dashboard</a></li>
         </ul>
     </nav>
    <div class="sidebar-bottom">
        <a href="../logout.php" class="logout-btn">Log out</a>
    </div>
</div>

<div class="content">
        <h1>Approve Customer Bookings</h1>
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
</section>
</body>
</html>
