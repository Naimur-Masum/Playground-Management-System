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
        if(empty($_POST["name"])){
            header("Location:../view/admin/aboutActivity.php?hasErrr=activity name can not be empty");
            exit();
        }
        
        if($_POST["submit"]=="Add"){
           
            $activity=authActivity(trim($_POST["name"]));
            
            //ECHO "$name $pass";
            if($activity)
            {
                $hasErr="problem";
                header("Location:../view/admin/aboutActivity.php?hasErrr=$hasErr");
                exit();
            }

            else
            {
                $add=addActivity(trim($_POST["name"]),trim($_POST["price"]),trim($_POST["duration"]));
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

        elseif ($_POST["submit"] == "Update") {
        
            $name = trim($_POST["name"]);
            $price = trim($_POST["price"]);
            $duration = trim($_POST["duration"]);
            $updated = false;

            if (!empty($duration)) {
                if (updateActivityDuration($name, $duration)) {
                    $updated = true;
                }
            }

            if (!empty($price)) {
                if (updateActivityPrice($name, $price)) {
                    $updated = true;
                }
            }

            if ($updated) {
                header("Location: ../view/admin/aboutActivity.php?up=success");
            } else {
                header("Location: ../view/admin/aboutActivity.php?hasErrr=no_changes");
            }
            exit();
        }
     }
?>