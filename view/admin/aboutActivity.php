<?php
    require_once("../../controller/returnAllActivity.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>About Activities</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="home.php">Dashboard</a>
    <a href="aboutCustomer.php" >Customers</a>
    <a href="aboutEmployee.php">Staffs</a>
    <a href="aboutActivity.php" style="color:sandybrown">Activities</a>
    <a href="../logout.php">Logout</a>
  </div>

  <div class="main">
    <div class="header">
      <h1>About Activities</h1>
    </div>

    
    <table>
      <thead>
        <tr>
          <th>Activity</th>
          <th>Price</th>
          <th>Duration(hour)</th>
        </tr>
      </thead>
      <tbody>
        <?php
            foreach($total as $row){
        ?>
        <tr>
          <td><?php echo ($row["name"]); ?></td>
          <td><?php echo ($row["price"]); ?></td>
          <td><?php echo ($row["duration"]); ?></td>
        </tr>
        <?php
            }
            $total=0;
        ?>
      </tbody>
    </table>
    <button onclick="window.location.href='home.php'" style="position:fixed; 
     right:40px; bottom:20px;">Back</button>
  
  <div class="give">
            <form action="../../controller/cudActivity.php" method="POST">
            
            <label for="name">Activity:</label>           
            <input type="text" id="name" name="name">
            

            <label for="price">Price:</label>
            <input type="number" id="price" name="price">


            <label for="duration">Duration:</label>
            <input type="text" id="duration" name="duration">
            
            
            <span style="color:Red;"><?php 
            if(isset($_GET["hasErr"]))
            {
                
                echo '<script>alert("Something Woring.")</script>';
                
            }
            else if(isset($_GET["ad"]))
            {

                echo '<script>alert("This activity added successfully.")</script>';
            }
            else if(isset($_GET["dl"])){
                echo '<script>alert("This activity deleted successfully.")</script>';
            }
             else if(isset($_GET["up"])){
                echo '<script>alert("This activity updated successfully.")</script>';
            }
            ?></span><br>
            <input type="submit" name="submit" value="Add">
            <p style="color:blue;front-size 1px;">(For delete just need name)</p>
            <input type="submit" name="submit" value="Delete">
            <input type="submit" name="submit" value="Update">

        </form>
    </div>
</div>
</body>
</html>