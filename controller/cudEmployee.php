<?php
    require_once("../model/cud.php");

    if(($_SERVER["REQUEST_METHOD"]=="POST")&&(isset($_POST["submit"]))){
        
        if($_POST["submit"]=="Add"){
             $em=trim($_POST["emailAdd"]);
            if(filter_var($em,FILTER_VALIDATE_EMAIL)){
                
                
                $user=authEmployee($em);
                if(!$user){
                    addApprovedEmail($em);
                    header("Location:../view/admin/aboutEmployee.php?");
                }

                else{
                    header("Location:../view/admin/aboutEmployee.php?There have someone.");
                }
            }
        }

        if($_POST["submit"]=="Delete"){
            
            $em=trim($_POST["emailDelete"]);
            if(filter_var($em,FILTER_VALIDATE_EMAIL)){
               $approved = authEmployee($em);
               $user = authUser($em); 

            if ($approved || $user) {
                    deleteEmployeeUsers($em);
                    deleteEmployeeAdminApproves($em);
                    header("Location:../view/admin/aboutEmployee.php?");
                }
                else{
                    header("Location:../view/admin/aboutEmployee.php?There have no user.");
                }
            }
        }
    }
?>