<?php
    require_once("database.php");
    function authUser($userName){
        $conn=getConnection();
        $sql="SELECT * FROM users WHERE username='$userName'";
        $result=mysqli_query($conn,$sql);
        
        return mysqli_fetch_assoc($result);
    }

    function addUser($userName,$pass,$role,$fullname,$email){
        $conn=getConnection();
        $sql="INSERT INTO users(username,password,role,full_name,email)VALUE('$userName','$pass','$role',
             '$fullname','$email')";
        $result=mysqli_query($conn,$sql);

        return $result;
    }
?>