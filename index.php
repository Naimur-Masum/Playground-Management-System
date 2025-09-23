<?php
        session_start();
    
        if(isset($_SESSION["loginEmail"]) && isset($_SESSION["role"])){
            
            if($_SESSION["role"]=="admin"){
                header("Location:view/admin/home.php");
                exit();
            }

             if($_SESSION["role"]=="customer"){
                header("Location:view/customer/home.php");
                exit();
            }

            if($_SESSION["role"]=="employee"){
                header("Location:view/employee/home.php");
                exit();
            }
        }
       
        else
         header("Location: view/login.php");
?>

