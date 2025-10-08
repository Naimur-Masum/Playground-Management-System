<?php
    require_once("database.php");
    function authUser($userName){
        $conn=getConnection();
        $sql="SELECT * FROM users WHERE username='$userName'";
        $result=mysqli_query($conn,$sql);
        
        return mysqli_fetch_assoc($result);
    }

    function authEmployee($email){
        $conn=getConnection();
        $sql="SELECT * FROM admin_approves WHERE email='$email'";
        $result=mysqli_query($conn,$sql);

        if($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        
        return false;
    }

   function addUser($userName, $pass, $role, $fullname, $email){
    $conn = getConnection();
    $sql = "INSERT INTO users(username, password, role, full_name, email) 
        VALUES ('$userName','$pass', '$role', '$fullname', '$email')";
    if (mysqli_query($conn, $sql)) {
        
        return mysqli_insert_id($conn);
    } 

    else {
        return false;
    }
}
    
?>