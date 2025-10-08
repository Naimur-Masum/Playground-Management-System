<?php
   
    require_once("userLogin.php");
    $emailErr="";
    $passErr="";
    $hasErr=false;
    $invalidUser="";

    if(($_SERVER["REQUEST_METHOD"]=="POST") && (isset($_POST["submit"]))){
        if(!filter_var(trim($_POST["loginEmail"]),FILTER_VALIDATE_EMAIL))
        {
            $hasErr=true;
            $emailErr="Invalid Email";
        }

        if(empty($_POST["loginPassword"]))
        {
            $hasErr=true;
            $passErr="Password cann't be empty.";
        }

        if($hasErr)
        {
            header("Location:../view/login.php?emailErr=$emailErr&passErr=$passErr");
            exit();
        }

        else
        {      
            $user=searchUser($_POST["loginEmail"],$_POST["loginPassword"]);
            
            //ECHO "$name $pass";
            if(!$user)
            {
                $invalidUser="You are not registered.";
                header("Location:../view/login.php?invalidUser=$invalidUser");
                exit();
            }

            else
            {
                setcookie("password",$user["password"],time()+1800,"/");
                //setcookie("role",$user["role"],time()+1800);
                session_start();
                $_SESSION["loginEmail"]=$user["email"];
                $_SESSION["role"]=$user["role"];

                if($user['role'] == "employee" || $user['role'] == "customer"){
                    $_SESSION["user_id"]=$user["user_id"];
                    $_SESSION["full_name"]=$user["full_name"];
                }
                
                if($user["role"]=="admin"){
                  header("Location:../view/admin/home.php");
                }
                else if($user["role"]=="customer"){
                    header("Location:../view/customer/customerDashboard.php");
                }
                else{
                    header("location:../view/employee/employeeDashboard.php");
                }
            }
        }
    }