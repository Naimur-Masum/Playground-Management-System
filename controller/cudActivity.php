<?php
   
    require_once("../model/cud.php");
    $ad="";
    $dl="";
    $up="";
    $hasErr="";
    

    if(($_SERVER["REQUEST_METHOD"]=="POST") && (isset($_POST["submit"]))){

        if(!isset($_POST["name"]) || !isset($_POST["price"]) || !isset($_POST["duration"])){
            //header("Location:../view/admin/aboutActivity.php?hasErrr=$hasErr");
            exit();
        }
        
        if($_POST["submit"]=="Add"){
           
            $user=authActivity($_POST["name"]);
            
            //ECHO "$name $pass";
            if($user || empty($user))
            {
                $hasErr="hey";
                header("Location:../view/admin/aboutActivity.php?hasErrr=$hasErr");
                exit();
            }

            else
            {
                $add=addActivity($_POST["name"],$_POST["price"],$_POST["duration"]);
                if($add){
                   $ad="hey";
                   header("Location:../view/admin/aboutActivity.php?ad=$ad");
                   exit();
                }

                else{
                    $hasErr="hey";
                    header("Location:../view/admin/aboutActivity.php?hasErrr=$hasErr");
                    exit();
                }
            }
        }

        else if($_POST["submit"]=="Delete"){
            $user=authActivity($_POST["name"]);
            
            
            if(!$user)
            {
                $hasErr="hey";
                header("Location:../view/admin/aboutActivity.php?hasErrr=$hasErr");
                exit();
            }

            else
            {
                $delete=deleteActivity($_POST["name"]);
                if($delete){
                   $dl="hey";
                   header("Location:../view/admin/aboutActivity.php?dl=$dl");
                   exit();
                }

                else{
                    $hasErr="hey";
                
                header("Location:../view/admin/aboutActivity.php?hasErrr=$hasErr");
                exit();
                }
            }
        }

        else if($_POST["submit"]=="Update"){
            $user=authActivity($_POST["name"]);
            
            
            if(!$user || $user==="")
            {
                $hasErr="hey";
                header("Location:../view/admin/aboutActivity.php?hasErrr=$hasErr");
                exit();
            }

            else
            {
                if(empty($_POST["duration"])){
                    $hasErr="hey";
                    header("Location:../view/admin/aboutActivity.php?hasErrr=$hasErr");
                    exit();
                }
                else{
                    $update1=updateActivityDuration($_POST["name"],$_POST["duration"]);
                    if($update1){
                        $up="hey";
                        header("Location:../view/admin/aboutActivity.php?up=$up");
                        exit();
                    }
                

                    else{
                        $hasErr="hey";
                    
                        header("Location:../view/admin/aboutActivity.php?hasErrr=$hasErr");
                        exit();
                    }
                }
                
                if(empty($_POST["price"])){
                    $hasErr="hey";
                    header("Location:../view/admin/aboutActivity.php?hasErrr=$hasErr");
                    exit();
                }
                else{
                    $update2=updateActivityPrice($_POST["name"],$_POST["price"]);
                    if($update2){
                        $up="hey";
                        header("Location:../view/admin/aboutActivity.php?up=$up");
                        exit();
                    }

                    else{
                        $hasErr="hey";                   
                        header("Location:../view/admin/aboutActivity.php?hasErrr=$hasErr");
                        exit();
                    }
                }

            }
        }
     }
?>