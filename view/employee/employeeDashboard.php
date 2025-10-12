<?php
require_once("../../controller/EmployeeShiftController.php");
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'employee') {
    header("Location: ../../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
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
                <li><a href="approveBooking.php">Approve Bookings</a></li>
                <li><a href="activities.php">Manage Activities</a></li>
                <li><a href="shift.php">My Shifts</a></li>
                <u><li><a href="employeeDashboard.php">Dashboard</a></li></u>
            </ul>
            </nav>

            <div class="sidebar-bottom">
                <a href="../logout.php" class="logout-btn">Log out</a>
            </div>
        </div>

    <div class="dash-content">
        <div class="text-box">
                <h1>Welcome back, <?php echo $_SESSION['full_name']; ?> </h1>
                <form method="POST" action="../../controller/EmployeeShiftController.php">
                    <input type="submit" name="clock_in" value="Clock In" class="btn-submit">
                    <input type="submit" name="clock_out" value="Clock Out" class="btn-submit">
                    <?php if (isset($_GET['message'])) { ?>
                    <p style="color:green;"><?php echo htmlspecialchars($_GET['message']); ?></p>
                    <?php } ?>
                </form>
            </div>
        </div>
</section>
</body>
</html>
