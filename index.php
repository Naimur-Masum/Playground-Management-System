<?php
        session_start();
    
        if(isset($_SESSION["loginEmail"]) && isset($_SESSION["role"])){
            
            if($_SESSION["role"]=="admin"){
                header("Location:view/admin/home.php");
                exit();
            }

             if($_SESSION["role"]=="customer"){
                header("Location:view/customer/customerDashboard.php");
                exit();
            }

            if($_SESSION["role"]=="employee"){
                header("Location:view/employee/employeeDashboard.php");
                exit();
            }
        }
       
        else
         header("Location: view/login.php");
?>

