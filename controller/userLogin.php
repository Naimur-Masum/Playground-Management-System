<?php
    require_once("../model/loginCheckUser.php");
    function searchUser($email,$password){
        
        return authUser($email,$password);
    }
?>