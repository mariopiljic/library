<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="" />
    </head>
<body>
    <div class="container">
    <p>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <p>You are logged in as admin.</p>
    <p>This is My Library</p>
    <p><a href="adminhome.php">Home</a></p>
    <a href="../Public/logout.php">Logout</a>
    </div>
</body>
</html>