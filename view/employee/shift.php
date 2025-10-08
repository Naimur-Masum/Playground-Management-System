<?php
require_once("../../controller/EmployeeShiftController.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Shift</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <h2>Employee Panel</h2>
        <a href="shift.php" style="color:sandybrown">Shifts</a>
        <a href="../logout.php">Logout</a>
    </div>

    <div class="main">
        <div class="header">
            <h1>My Shifts</h1>
        </div>

        <?php if (isset($_GET['message'])) { ?>
            <p style="color:green;"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php } ?>

        <div class="shift-buttons">
            <form method="POST" action="../../controller/EmployeeShiftController.php">
                <input type="submit" name="clock_in" value="Clock In">
                <input type="submit" name="clock_out" value="Clock Out">
            </form>

        </div>

        <h2>Shift History</h2>
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
</body>
</html>
