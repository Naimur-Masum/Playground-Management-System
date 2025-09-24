<?php
    require_once("database.php");

    function countUser($role){
        $conn=getConnection();
        $sql="SELECT * FROM users WHERE role='$role'";
        $result=mysqli_query($conn,$sql);
        return mysqli_num_rows($result);
    }

    function countActivity(){
        $conn=getConnection();
        $sql="SELECT * FROM activities";
        $result=mysqli_query($conn,$sql);
        return mysqli_num_rows($result);
    }

    function allActivity(){
        $conn=getConnection();
        $sql="SELECT * FROM activities";
        $result=mysqli_query($conn,$sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function allUser($role){
        $conn=getConnection();
        $sql="SELECT * FROM users WHERE role='$role'";
        $result=mysqli_query($conn,$sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

?>