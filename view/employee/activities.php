<?php
require_once('../../controller/EmployeeActivityController.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Activities</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
<section class="emp-header">
<div class="sidebar">
    <nav>
        <ul>
            <li><a href="approveBooking.php">Approve Bookings</a></li>
            <u><li><a href="activities.php">Manage Activities</a></li></u>
            <li><a href="shift.php">My Shifts</a></li>
            <li><a href="employeeDashboard.php">Dashboard</a></li>
        </ul>
    </nav>

    <div class="sidebar-bottom">
        <a href="../logout.php" class="logout-btn">Log out</a>
    </div>
</div>

<div class="content">
    <h1>Edit Available Activities</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
    <tbody>
    <?php foreach ($activities as $act): ?>
        <tr>
            <form action="../../controller/EmployeeActivityController.php" method="POST">
                <td><?php echo $act['activity_id']; ?></td>
                <td><input type="text" name="name" value="<?php echo $act['name']; ?>"></td>
                <td><input type="number" name="price" value="<?php echo $act['price']; ?>" step="0.01"></td>
                <td><input type="text" name="duration" value="<?php echo $act['duration']; ?>"></td>
                <td>
                    <input type="hidden" name="activity_id" value="<?php echo $act['activity_id']; ?>">
                    <button type="submit" name="update" class="btn-action">Update</button>
                </td>
            </form>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</section>
</body>
</html>
