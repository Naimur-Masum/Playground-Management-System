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

    function updateActivityPrice($name,$price){
        $conn=getConnection();
        $sql="UPDATE activities SET price='$price' WHERE name='$name'";
        $result=mysqli_query($conn,$sql);

        return $result;
    }

    function updateActivityDuration($name,$duration){
        $conn=getConnection();
        $sql="UPDATE activities SET duration='$duration' WHERE name='$name'";
        $result=mysqli_query($conn,$sql);

        return $result;
    }

    function addApprovedEmail($email){
        $conn=getConnection();
        $sql="INSERT INTO admin_approves(email)VALUE('$email')";
        $result=mysqli_query($conn,$sql);

        return $result;
    }

    function authEmployee($email){
        $conn=getConnection();
        $sql="SELECT * FROM admin_approves WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        
        return mysqli_fetch_assoc($result);
    }

    function authUser($email){
        $conn = getConnection();
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        
        return mysqli_fetch_assoc($result);
    }

    function deleteEmployeeUsers($email){
        $conn=getConnection();
        $sql="DELETE FROM users WHERE email='$email'";
        $result=mysqli_query($conn,$sql);

        return $result;
    }

    function deleteEmployeeAdminApproves($email){
        $conn=getConnection();
        $sql="DELETE FROM admin_approves WHERE email='$email'";
        $result=mysqli_query($conn,$sql);

        return $result;
    }
?>