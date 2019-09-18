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
  <link href="library.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php include('header.php'); ?>

<?php
  require('../Private/configuration.php');
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
                username = '$username', email = '$email', usertype = 'user', password = '$hash_password' WHERE id = '$id'";
              
          $result = $db->query($query);
      
          if($result){
            echo "<div id='minh'>
                  <h3>You have edited your informations successfully.</h3>
                  <a data-toggle='tooltip' title='Click here to login.' style='width:80px;' href='login.php' role='button' class='btn btn-primary' name='login_btn'>Login</a> 
                  </div>";
          } else{
              echo "<div id='minh'>
              <h3>Please use different username.</h3>
              <a data-toggle='tooltip' title='Click here to go back.' style='width:80px;' href='myProfile.php' role='button' class='btn btn-primary' name='edit_btn'>Back</a> 
              </div>";
          }
        
  } else{
?>
<div id="editprofile" class="container">
  
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
      <input type="password" class="form-control" id="password" placeholder="" name="password" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please enter password.</div>
    </div>
    <button style="width:80px;" type="submit" class="btn btn-primary" name="edit_btn">Done</button>
  </form>
  
</div>
<?php } ?>
<?php include('footer.php') ?>
</body>
</html> 
