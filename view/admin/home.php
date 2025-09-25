<?php
session_start();

if(!isset($_SESSION["loginEmail"]) && !isset($_SESSION["role"])){
        header("Location:../login.php");
        exit;
}

if($_SESSION["role"]!="admin"){

    header("Location:../login.php");
    echo "<br><a href='../logout.php'>logout</a>";

}
 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="home.php" style="color:sandybrown">Dashboard</a>
    <a href="aboutCustomer.php">Customers</a>
    <a href="aboutEmployee.php">Staffs</a>
    <a href="aboutActivity.php">Activities</a>
    <a href="../logout.php">Logout</a>
  </div>

  <div class="main">
    <div class="header">
      <h1>Dashboard Overview</h1>
      <p>Welcome, Admin</p>
    </div>

    
    <div class="cards">
      <div class="card">
        <h2 id="response"></h2>
        <script>
            function loadDoc() {
            const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                document.getElementById("response").innerHTML = this.responseText;
                }
                xhttp.open("GET", "../../controller/returnCustomerCount.php", true); // PHP in another folder
                xhttp.send();
            }

            setInterval(loadDoc, 1000);
        </script>
        <p>Customer</p>
      </div>

      <div class="card">
        <h2 id="response1"></h2>
        <script>
            function loadDoc() {
            const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                document.getElementById("response1").innerHTML = this.responseText;
                }
                xhttp.open("GET", "../../controller/returnEmployeeCount.php", true); // PHP in another folder
                xhttp.send();
            }

            setInterval(loadDoc, 1000);
        </script>
        <p>Staff Members</p>
      </div>

      <div class="card">
        <h2 id="response2"></h2>
        <script>
            function loadDoc() {
            const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                document.getElementById("response2").innerHTML = this.responseText;
                }
                xhttp.open("GET", "../../controller/returnActivityCount.php", true); // PHP in another folder
                xhttp.send();
            }

            setInterval(loadDoc, 1000);
        </script>
        <p>Activities</p>
      </div>
    
</body>
</html>
