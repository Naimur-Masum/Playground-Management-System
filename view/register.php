
<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">
        <h2>Register</h2>

        

        <form action="../controller/authRegisterController.php" method="POST">
            <label for="userName">User Name:</label>
            <input type="text" id="userName" name="userName">
            <span style="color:Red;">
                <?php
                 if(isset($_GET['nameErr']))
                {
                echo ($_GET['nameErr']);
                }
                ?>
            </span><br>

            <label for="email">Email:</label>
            <input type="text" id="userEmail" name="userEmail">
            <span style="color:Red;"><?php if(isset($_GET['emailErr'])){echo $_GET['emailErr'];} ?></span><br>

            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName">
            <span style="color:Red;"><?php if(isset($_GET['fullnameErr'])){echo $_GET['fullnameErr'];}?></span><br>

            <label for="password">Password:</label>
            <input type="password" id="userPassword" name="userPassword">
            <span style="color:Red;"><?php if(isset($_GET['passwordErr'])){echo $_GET['passwordErr'];} ?></span><br>
            

            <label for="userConfirm">Confirm Password:</label>
            <input type="password" id="userConfirm" name="userConfirm">
            <span style="color:Red;"><?php if(isset($_GET['confirmErr'])){echo $_GET['confirmErr'];}?></span><br>

            <p>Register as:</p>
            
            <label for="role"></label>
            <input type="radio" id="customer" name="role" value="Customer">Customer
            <input type="radio" id="employee" name="role" value="Employee">Employee<br>
            <span style="color:Red;"><?php if(isset($_GET['roleErr'])){echo $_GET['roleErr'];}?></span><br>

            <span style="color:Red;"><?php if(isset($_GET['userExist']))
            {
                
                echo '<script>alert("This username alrady registered")</script>';
               
            }
            ?></span><br>

            <?php 
            if(isset($_GET['done']))
            {
                echo '<script>alert("Registerd Successfully")</script>';
                
            }
            ?>

            <input type="submit" name="submit" value="Submit">

        </form>
        <div class="link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

</body>
</html>




