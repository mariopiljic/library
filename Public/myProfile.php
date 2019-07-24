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
</head>
<body>

  <header>
    <div class="jumbotron">
        <div class="media">
            <img id="lib_pic" src="Images/Library_logo.jpg" alt="Library_sign" class="align-self-center mr-3">
            <div class="align-self-center mr-3">
              <h1>My Library</h1>
            </div>
          </div>
          <p style="text-align:right;"><a href="logout.php">Logout</a></p>
    </div>
    
    <nav>
      <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myProfile.php">My Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="books.php">Books</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
        </ul>
    </nav>
  </header>
<?php

include('../Private/configuration.php');
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


  <footer>
    <div class="footer">
      <pre>
           My Library
           Adress
           Phone
           Email adress
      </pre>
    </div>
  </footer>
</body>
</html>  
