<?php
session_start();

if(isset($_SESSION["role"])) {
    if($_SESSION["role"] == "admin") {
        header("Location: admin/home.php");
        exit;
    }
    elseif($_SESSION["role"] == "employee") {
        header("Location: employee/shift.php");
        exit;
    }
    elseif($_SESSION["role"] == "customer") {
        header("Location: customer/activities.php");
        exit;
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
            <label for="loginEmail">Email:</label>
            <input type="text" id="loginEmail" name="loginEmail" autocomplete="off"
             placeholder="Enter email">
            <span name="emailErr" style="color:red;">
                <?php 
                    if(isset($_GET["emailErr"]))
                    {                       
                        echo $_GET["emailErr"];
                    }
                ?>
            </span><br>

            <label for="loginPassword">Password:</label>
            <!--<input type="password" id="loginPassword" name="loginPassword" placeholder="Enter password">-->
            <input type="password" id="loginPassword" name="loginPassword" autocomplete="off" placeholder="password" value="<?php echo(isset($_COOKIE['password']))?$_COOKIE['password']:''?>">
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
            <label>Remeber me:</label>
            <input type="checkbox" name="remember" value="Remeber"><br>
        </form>
        <div class="link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
   
</body>
</html>
