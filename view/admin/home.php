<?php
session_start();

if(!isset($_SESSION["loginEmail"]) && !isset($_SESSION["role"])){
        header("Location:../login.php");
        exit;
}

if($_SESSION["role"]=="admin"){

    echo "Ami Admin.Ha Ha.";
    echo "<br><a href='../logout.php'>logout</a>";

}
 
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
    <form action="home.php">
        <button type='submit' value='submit'>click</button>
    </form>
</body>
</html>