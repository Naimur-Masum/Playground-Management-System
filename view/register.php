<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="register.js"></script>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form onsubmit="return validateRegister()">
            <label>Full Name:</label>
            <input type="text" id="regName" placeholder="Enter name">

            <label>Email:</label>
            <input type="email" id="regEmail" placeholder="Enter email">

            <label>Password:</label>
            <input type="password" id="regPassword" placeholder="Enter password">

            <label>Confirm Password:</label>
            <input type="password" id="regConfirm" placeholder="Confirm password">

            <button type="submit">Register</button>
        </form>
        <div class="link">
            <p>Already have an account? <a href="login.html">Login here</a></p>
        </div>
    </div>
</body>
</html>
