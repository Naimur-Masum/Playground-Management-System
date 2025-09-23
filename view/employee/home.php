<?php
    session_start();

    if(!isset($_SESSION["loginEmail"]) && !isset($_SESSION["role"])){
        header("Location:../login.php");
        exit;
    }
    if($_SESSION["role"]=="employee"){
        echo "i am an employee.";
        echo "<br><a href='../logout.php'>logout</a>";
    }   
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
    <form action="">
        <button type='submit' value='submit'>click</button>
</body>
</html>