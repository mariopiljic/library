<?php
    include('configuration.php');
    
        $id = $_GET['id'];
        $id = mysqli_real_escape_string($db, $id);
        $query = "DELETE FROM `books` WHERE id = '$id' LIMIT 1"; 
        $result = mysqli_query($db, $query) or die ( mysqli_error());
        header("location: books.php"); 
?>