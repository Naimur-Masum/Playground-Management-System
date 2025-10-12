<?php
require_once("../../controller/EmployeeShiftController.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Shift</title>
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
                <u><li><a href="shift.php">My Shifts</a></li></u>
                <li><a href="employeeDashboard.php">Dashboard</a></li>
            </ul>
        </nav>

        <div class="sidebar-bottom">
            <a href="../logout.php" class="logout-btn">Log out</a>
        </div>
        
    </div>

    <div class="content">
            <h1>My Shifts History</h1>

        <?php if (isset($_GET['message'])) { ?>
            <p style="color:green;"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php } ?>

        <div class="shift-buttons">
            <form method="POST" action="../../controller/EmployeeShiftController.php">
                <input type="submit" name="clock_in" value="Clock In" class="btn-submit">
                <input type="submit" name="clock_out" value="Clock Out" class="btn-submit">
            </form>
        </div>
        <br><br>

        <table>
            <thead>
                <tr>
                    <th>Shift ID</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Total Hours</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shifts as $shift) { ?>
                    <tr>
                        <td><?php echo $shift['shift_id']; ?></td>
                        <td><?php echo $shift['check_in']; ?></td>
                        <td><?php echo $shift['check_out'] ?? '-'; ?></td>
                        <td><?php echo $shift['total_hours'] ?? '-'; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </section>
</body>
</html>
