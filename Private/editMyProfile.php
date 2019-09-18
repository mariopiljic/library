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
    $id = mysqli_real_escape_string($db, $id);
    $query = "SELECT * FROM `users` WHERE id = '$id'";
    $result = $db->query($query);
    $user = $result->fetch_array();
    

  if (isset($_POST['username'])){
    
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);    
    $username = mysqli_real_escape_string($db, $_POST['username']); 
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    
   
    
    $query = "UPDATE `users` SET firstname = '$firstname', lastname = '$lastname', 
                username = '$username', email = '$email', usertype = 'admin', password = '$hash_password' WHERE id = '$id'";
              
          $result = $db->query($query);
      
          if($result){
            echo 
              "<div class='form'>
              <h3>You are edited your informations successfully.</h3>
              <p>Click here to login</p>
              <a style='width:80px;' href='..//Public/login.php' role='button' class='btn btn-primary' name='login_btn'>Login</a> 
              </div>";
          } else{
              echo 
                "<div class='form'>
                <h3>Please use different username.</h3>
                <p>Click here to go back</p>
                <a style='width:80px;' href='myProfile.php' role='button' class='btn btn-primary' name='edit_btn'>Back</a> 
                </div>";
            }
        
  } else{
?>
<div id="editadmin" class="container">
  
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
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="passwordd" placeholder="" name="password" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter password.</div>
    </div>
    <button style="width:80px;" type="submit" class="btn btn-primary" name="edit_btn">Done</button>
  </form>
  
</div>
<?php } ?>
</body>
</html>
