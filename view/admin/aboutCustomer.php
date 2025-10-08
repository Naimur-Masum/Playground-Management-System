<?php
    require_once("../../controller/returnAllCustomer.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Informetion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="home.php">Dashboard</a>
    <a href="aboutCustomer.php" style="color:sandybrown">Customers</a>
    <a href="aboutEmployee.php">Staffs</a>
    <a href="aboutActivity.php">Activities</a>
    <a href="../logout.php">Logout</a>
  </div>

  <div class="main">
    <div class="header">
      <h1>Customers Informetion</h1>
    </div>

    
    <table>
      <thead>
        <tr>
          <th>User Id</th>
          <th>Username</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php
            foreach($total as $row){
        ?>
        <tr>
          <td><?php echo ($row["user_id"]); ?></td>
          <td><?php echo ($row["username"]); ?></td>
          <td><?php echo ($row["email"]); ?></td>
        </tr>
        <?php
            }
            $total=0;
        ?>
      </tbody>
    </table>
    <button onclick="window.location.href='home.php'" style="position:fixed; 
     right:40px; bottom:20px;">Back</button>
  </div>
</body>
</html>