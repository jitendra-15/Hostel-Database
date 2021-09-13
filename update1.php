<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "hosteldatabase";
            // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "UPDATE student SET ".$_POST["att"]." ='".$_POST["up"]."' WHERE reg_No = '".$_POST["rno"]."'";
    $result = $conn->query($sql);

    if($result === TRUE){
        echo'<script> alert("Update successful"); 
             location.replace("https://localhost/HostelDatabase/update.php");
        </script>';
    }
    else {
        echo"Error: " .$conn->error;
    }
?>