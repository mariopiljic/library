<?php
    include("../Private/functions.php");
    isLogged();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link href="library.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

  <?php include('header.php'); ?>
  <?php 
       include('../Private/configuration.php');    
       $query = "SELECT * FROM `books`";
       $result = $db->query($query);
       $row = mysqli_num_rows($result);
  ?>

  <div id="minh">
    <p>Welcome <?php echo  htmlspecialchars($_SESSION['username']); ?>!</p>
    <p>This is My Library.</p>
    <p>Currently we have <?php echo $row; ?> books.</p>
  </div>
  
    <?php include('footer.php') ?>



</body>
</html>
