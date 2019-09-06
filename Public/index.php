<?php
    include("../Private/functions.php");
    isLogged();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="../Public/library.css" rel="stylesheet">
</head>
<body>
    <div>
    <p>Welcome <?php echo  htmlspecialchars($_SESSION['username']); ?>!</p>
    <p>This is My Library</p>
    <p><a href="home.php">Home</a></p>
    <a href="logout.php">Logout</a>
    </div>
</body>
</html>
