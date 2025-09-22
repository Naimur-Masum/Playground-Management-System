<?php
        if(isset($_SESSION["loginEmail"]) && isset($_SESSION["role"])){
            
            if($_SESSION["role"]=="admin"){
                header("Location:admin/home.php");
            }
        }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="../controller/authLoginController.php" method="POST">
            <label >Email:</label>
            <input type="text" id="loginEmail" name="loginEmail" placeholder="Enter email">
            <span name="emailErr" style="color:red;">
                <?php 
                    if(isset($_GET["emailErr"]))
                    {                       
                        echo $_GET["emailErr"];
                    }
                ?>
            </span><br>

            <label>Password:</label>
            <input type="password" id="loginPassword" name="loginPassword" placeholder="Enter password">
            <span name="passErr" style="color:red;">
                <?php 
                    if(isset($_GET["passErr"]))
                    {
                        echo $_GET["passErr"];
                    }
                ?>
            </span><br>

            <input type="submit" name="submit" value="login">
            <span name="invalidUser" style="color:red;">
                <?php 
                    if(isset($_GET["invalidUser"]))
                    {
                        echo $_GET["invalidUser"];
                    }
                ?>
            </span><br>
        </form>
        <div class="link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
   
</body>
</html>
