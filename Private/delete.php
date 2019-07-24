<?php
    include('configuration.php');
    session_start();
    
        $id = $_GET['id'];
        $id = mysqli_real_escape_string($db, $id);
        $query = "DELETE FROM `users` WHERE id = '$id' LIMIT 1";
        $result = mysqli_query($db, $query) or die ( mysqli_error());
        header("location: users.php"); 
?>