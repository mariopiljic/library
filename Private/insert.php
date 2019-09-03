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
  
    if (isset($_POST['username'])){
    
        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);    
        $username = mysqli_real_escape_string($db, $_POST['username']); 
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $usertype = mysqli_real_escape_string($db, $_POST['usertype']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "SELECT * FROM `users` WHERE username = '$username'";
        $result = $db->query($query);
        $rows = mysqli_num_rows($result);
        if($rows == 1){
          echo 
            "<div class='form'>
              <h3>Please use different username.</h3>
              <p>Click here to continue.</p>
              <a href='insert.php' style='width:80px;' role='button' class='btn btn-primary'>Back</a>
            </div>";
        } else{
        
                $query = "INSERT into `users` (firstname, lastname, username, email, usertype, password)
                            VALUES ('$firstname', '$lastname', '$username', '$email', '$usertype', '$hash_password' )";
                $result = $db->query($query);
                
                if($result){
                  echo 
                    "<div class='form'>
                      <h3>You added new user successfully.</h3>
                      <p>Click here to continue.</p>
                      <a href='users.php' style='width:80px;' role='button' class='btn btn-primary'>Back</a>
                    </div>";
                }
          } 
  } else{
?>
<div id="insert" class="container">
  
  <form action="" class="was-validated" method="post">
    <div class="form-group">
      <label for="firstname">FIrstname:</label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter firstname.</div>
    </div>
    <div class="form-group">
      <label for="lastname">Lastname:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter lastname.</div>
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter username.</div>
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter Email.</div>
    </div>
    <div class="form-group">
    <label for="usertype">User type:</label>
      <select class="form-control" id="usertype" placeholder="Select user type" name="usertype" required>
        <option>user</option>
        <option>admin</option>
      </select>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter user type.</div>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter password.</div>
    </div>
    <button style="width:80px;"type="submit" class="btn btn-primary" name="signup_btn">Add</button>
  </form>
  
</div>
<?php } ?>
</body>
</html>
