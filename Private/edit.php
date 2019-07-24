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
<?php
  require('configuration.php');
  session_start();
  $id = $_GET['id'];
  $id = mysqli_real_escape_string($db,$id);
  $query = "SELECT * FROM `users` WHERE id = '$id'";
  $result = $db->query($query);
  $user = $result->fetch_array();
  

  if (isset($_POST['username'])){
    
    
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);    
    $username = mysqli_real_escape_string($db, $_POST['username']); 
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $usertype = mysqli_real_escape_string($db, $_POST['usertype']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    $query = "SELECT * FROM `users` WHERE username = '$username'";
    $result = $db->query($query);
    $rows = mysqli_num_rows($result);
    if($rows == 1){
      echo "<div class='form'>
                  <h3>Please use different username.</h3>
                  <br/><a href='users.php'>Click here to edit user.</a></div>";
    } else{
    
    $query = "UPDATE `users` SET firstname = '$firstname', lastname = '$lastname', 
                username = '$username', email = '$email' , usertype = '$usertype', password = '$password' WHERE id = '$id'";
              
          $result = $db->query($query);
      
          if($result){
            echo "<div class='form'>
                  <h3>You are edited informations successfully.</h3>
                  <br/><a href='users.php'>Click here to continue.</a></div>";
          }
        }
  } else{
?>
<div class="container">
  
  <form action="" class="was-validated" method="post">
    <div class="form-group">
      <label for="firstname">FIrstname:</label>
      <input type="text" class="form-control" id="firstname" placeholder="<?php echo htmlspecialchars($user['firstname']); ?>" name="firstname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter firstname.</div>
    </div>
    <div class="form-group">
      <label for="lastname">Lastname:</label>
      <input type="text" class="form-control" id="lastname" placeholder="<?php echo htmlspecialchars($user['lastname']); ?>" name="lastname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter lastname.</div>
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="<?php echo htmlspecialchars($user['username']); ?>" name="username" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter username.</div>
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" id="email" placeholder="<?php echo htmlspecialchars($user['email']); ?>" name="email" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter Email.</div>
    </div>
    <div class="form-group">
    <label for="usertype">User type:</label>
      <select class="form-control" id="usertype" placeholder="<?php echo htmlspecialchars($user['usertype']); ?>" name="usertype" required>
        <option>user</option>
        <option>admin</option>
      </select>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter user type.</div>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="<?php echo htmlspecialchars($user['password']); ?>" name="password" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter password.</div>
    </div>
    <button type="submit" class="btn btn-primary" name="signup_btn">Edit</button>
  </form>
  
</div>
<?php } ?>
</body>
</html>