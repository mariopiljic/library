<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script  src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  <link href="../Public/library.css" rel="stylesheet">
</head>
<body>

<?php include('adminheader.php'); ?>
<?php

include('configuration.php');
session_start();

$username = $_SESSION['username'];
$query = "SELECT * FROM `users` WHERE username = '$username'";
$result = $db->query($query);
$user = $result->fetch_array();

?>
  <div>
  
  <form >
    <div class="form-group">
      <label for="firstname">FIrstname:</label>
      <input type="text" class="form-control" id="firstname" placeholder="<?php echo htmlspecialchars($user['firstname']); ?>" name="firstname" required readonly>
      
    </div>
    <div class="form-group">
      <label for="lastname">Lastname:</label>
      <input type="text" class="form-control" id="lastname" placeholder="<?php echo htmlspecialchars($user['lastname']); ?>" name="lastname" required readonly>
      
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="<?php echo htmlspecialchars($user['username']); ?>" name="username" required readonly>
      
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" id="email" placeholder="<?php echo htmlspecialchars($user['email']); ?>" name="email" required readonly>
      
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="<?php echo htmlspecialchars($user['password']); ?>" name="password" required readonly>
      
    </div>
    
  </form>
  <a href="editMyProfile.php?id=<?php echo htmlspecialchars($user['id']); ?>">If You want to edit Your profile,please click here!</a>
</div>


  <?php include('adminfooter.php'); ?>
</body>
</html>  
