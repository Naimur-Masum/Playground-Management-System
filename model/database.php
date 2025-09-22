<?php
    $db_server ="localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name ="playground_management";
   

    function getConnection()
    {
        global $db_server;
        global $db_user;
        global $db_pass;
        global $db_name;

        $conn = mysqli_connect($db_server, $db_user,$db_pass,$db_name);
        if(!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }
   
?>