<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <!-- <script src="login.js" ></script> -->
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="myForm" onsubmit="return validateLogin()">
            <label>Email:</label>
            <input type="text" id="loginEmail" placeholder="Enter email">
            <span id="emailErr"></span><br>

            <label>Password:</label>
            <input type="password" id="loginPassword" placeholder="Enter password">
            
            <input type="submit" value="submit">
        </form>
        <div class="link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
     <script src="login.js" ></script>
</body>
</html>
