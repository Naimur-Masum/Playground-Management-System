<?php
    require_once("../model/registerCheckUser.php");

    $nameErr="";
    $emailErr="";
    $passwordErr="";
    $confirmErr="";
    $roleErr="";
    $fullnameErr="";
    $userExist="";
    $done="a";
    $empNotAllowed="";
    $status="";
    $name="";
    $email="";
    $fullname="";
    $password="";
    $role="";

    $hasErr=false;
    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["userName"])){
            $nameErr="Name cann't be empty";
            $hasErr=true;
        }
        else{
            if(preg_match("/^[a-zA-Z-' ]*$/",trim($_POST["userName"]))){
                $name=$_POST["userName"];
            }
            else{
                $nameErr="Invalid username.";
                $hasErr=true;
            }
        }

        if(empty($_POST["userEmail"])){
            $emailErr="Email cann't be empty";
            $hasErr=true;
        }
        else{
            $em=trim($_POST["userEmail"]);
            if(filter_var($em,FILTER_VALIDATE_EMAIL)){
                $email=$em;
            }
            else{
                $emailErr="Write a valid email";
                $hasErr=true;
            }
        }

        if(empty($_POST["fullName"])){
            $fullnameErr="Full name cann't be empty";
            $hasErr=true;
        }
        else{
            if(preg_match("/^[a-zA-Z]+([-' ][a-zA-Z]+)*\s+[a-zA-Z]+([-' ][a-zA-Z]+)*$/",$_POST["fullName"])){
                $fullname=$_POST["fullName"];
            }
            else{
                $fullnameErr="Write a valid name";
                $hasErr=true;
            }
        }

        if(empty($_POST["userPassword"])){
            $passwordErr="Set a password";
            $hasErr=true;
        }
        else{
            $st=$_POST["userPassword"];
            if(strlen($st)===6){
                $password=$_POST["userPassword"];
            }
            else{
                $passwordErr="Type exactly 6 characters or numbers";
                $hasErr=true;
            }
        }

        if(empty($_POST["userConfirm"])){
            $confirmErr="Write your password";
            $hasErr=true;
        }
        else{
            $st=$_POST["userConfirm"];
            if($st!==$password){

               $confirmErr="Type same password";
                $hasErr=true;
            }
            
        }

        if(empty($_POST["role"])){
            $roleErr="Select Your Role";
            $hasErr=true;
        }
        else{
            $role=$_POST["role"];
        }
    }

    if($hasErr){
        header("location:../view/register.php?nameErr=$nameErr&emailErr=$emailErr&fullnameErr=$fullnameErr&passwordErr=$passwordErr&confirmErr=$confirmErr&roleErr=$roleErr");
        exit();
    }

    else{
        /*
        $result=$conn-> query("select * from users where username='$name'");
        $row=$result->fetch_all(MYSQLI_ASSOC);

        if($row[0]['username']==$name){
             $_SESSION['userExist']="User exist";
            header("Location: register.php");
            exit();
        }
        */

        $user=authUser($name);

        if ($user) {
            $userExist = "User exist";
            header("Location:../view/register.php?userExist=$userExist");
            exit();
        }

        else{
           // $insert=addUser($name,$password,$role,$fullname,$email);
            
                $status;
            
                if ($role == "Employee") {
                    $approve = authEmployee($email);
                    if ($approve !== false) {
                        $insert = addUser($name, $password, $role, $fullname, $email);
                        if ($insert) {
                            header("Location:../view/register.php?status=success");
                        } else {
                            header("Location:../view/register.php?status=fail");
                        }
                    } 
                    else {
                        header("Location:../view/register.php?status=empNotAllowed");
                    }
                } 
                else {
                    $insert = addUser($name, $password, $role, $fullname, $email);
                    if ($insert) {
                        header("Location:../view/register.php?status=success");
                    } else {
                        header("Location:../view/register.php?status=fail");
                    }
                }
                exit();

           // header("Location:../view/register.php?done=$done&empNotAllowed=$empNotAllowed");
        }
    }
        

?>