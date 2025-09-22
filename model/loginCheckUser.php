<?php
    require_once("database.php");

    function authUser($email,$password){
        $conn=getConnection();
        $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result=mysqli_query($conn,$sql);

        return mysqli_fetch_assoc($result);
    }
?>