<?php
    require_once("../../controller/returnAllApprovedEmail.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Approved Email</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="home.php">Dashboard</a>
            <a href="aboutCustomer.php">Customers</a>
            <a href="aboutEmployee.php" style="color:sandybrown">Staffs</a>
            <a href="aboutActivity.php">Activities</a>
            <a href="../logout.php">Logout</a>
        </div>
        <div class="main">
            <div class="header">
                <h1>Approved Email</h1>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($total as $row){
                    ?>
                    <tr>               
                        <td><?php echo ($row["email"]); ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table><br>
            <button onclick="window.location.href='aboutEmployee.php'" style="position:fixed; 
            right:40px; bottom:20px;">Back</button>
        
        </div>
    </body>
</html>