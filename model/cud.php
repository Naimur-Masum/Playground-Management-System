<?php
    require_once("database.php");
    function authActivity($name){
        $conn=getConnection();
        $sql="SELECT * FROM activities WHERE name='$name'";
        $result=mysqli_query($conn,$sql);
        
        return mysqli_fetch_assoc($result);
    }

    function addActivity($name,$price,$duration){
        $conn=getConnection();
        $sql="INSERT INTO activities(name,price,duration)VALUE('$name','$price','$duration')";
        $result=mysqli_query($conn,$sql);

        return $result;
    }

    function deleteActivity($name){
        $conn=getConnection();
        $sql="DELETE FROM activities WHERE name='$name'";
        $result=mysqli_query($conn,$sql);

        return $result;
    }

    function updateActivity($name,$price,$duration){
        $conn=getConnection();
        $sql="UPDATE activities SET price='$price',duration='$duration' WHERE name='$name'";
        $result=mysqli_query($conn,$sql);

        return $result;
    }

?>