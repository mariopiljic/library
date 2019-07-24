<?php
    include("../Private/functions.php");
    isLogged();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="" />
    </head>
<body>
    <div class="container">
    <p>Welcome <?php echo  htmlspecialchars($_SESSION['username']); ?>!</p>
    <p>This is My Library</p>
    <p><a href="home.php">Home</a></p>
    <a href="logout.php">Logout</a>
    </div>
</body>
</html>