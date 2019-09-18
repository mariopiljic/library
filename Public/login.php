<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="library.css" rel="stylesheet">
</head>
<body>
<?php
require('../Private/configuration.php');
session_start();
if (isset($_POST['username'])){
      
  
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    $query = "SELECT * FROM `users` WHERE username = '$username'";
    $result = $db->query($query);
    $user = $result->fetch_array();
    
    if(password_verify($password, $user["password"])){   
      
        if ($user['usertype'] == 'admin') {
          
          $_SESSION['username'] = $username;
            header('Location: ../Private/adminindex.php');
        } else{		  
          
          $_SESSION['username'] = $username;
          header("Location: index.php");
          }
        } else{
      echo "<div id='minh'>
              <h3>Username or password is incorrect.</h3>
              <a data-toggle='tooltip' title='Click here to try again.' style='width:80px;' href='login.php' role='button' class='btn btn-primary' name='login_btn'>Login</a> 
            </div>";
          }
}else{
?>
<div id="login" class="container">
  <h2>Enter username and password</h2>
  <form action="" class="was-validated" method="post">
  
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter username.</div>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter password.</div>
    </div>
    <button style="width:80px;" type="submit" class="btn btn-primary" name="login_btn">Login</button>
    <a style="float:right; width:80px;" href="signup.php" role="button" class="btn btn-primary" name="signup_btn">Signup</a>
  </form>
  
</div>
<?php } ?>
</body>
</html>
