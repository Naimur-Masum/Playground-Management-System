<?php
require_once('../../controller/EmployeeActivityController.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Activities</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<h2>Admin Activities (Editable)</h2>

<table border="1" cellpadding="10">
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
                    <button type="submit" name="update">Update</button>
                </td>
            </form>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
