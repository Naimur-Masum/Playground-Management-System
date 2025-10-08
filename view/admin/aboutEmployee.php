<?php
    require_once("../../controller/returnAllEmployee.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Informetion</title>
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
    <div class="cud">
      <form action="../../controller/cudEmployee.php" method="POST">
        <h>Add Approved Email</h><br>
        <input type="text" name="emailAdd" placeholder="Enter email">
        <button type="submit" name="submit" value="Add">Add</button><br>
        <h>Delete Employee</h><br>
        <input type="text" name="emailDelete" placeholder="Enter email">
        <button type="submit" name="submit" value="Delete">Delete</button><br>        
      </form>
    </div>
    <div class="header">
      <h1>Employee Informetion</h1>
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
        ?>
      </tbody>
    </table><br>
    <button onclick="window.location.href='home.php'" style="position:fixed; right:40px;
     bottom:10px;">Back</button>

     <button onclick="window.location.href='approvedEmail.php'" style="position:fixed; left:225px;
     bottom:10px;">Next-></button>

  </div>
</body>
</html>