
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

  <header>
    <div class="jumbotron">
        <div class="media">
            <img id="lib_pic" src="../Public/Images/Library_logo.jpg" alt="Library_sign" class="align-self-center mr-3">
            <div class="align-self-center mr-3">
              <h1>My Library</h1>
            </div>
          </div>
          <p style="text-align:right;"><a href="../Public/logout.php">Logout</a></p>
    </div>
    
    <nav>
      <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="adminhome.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myProfile.php">My Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">Users</a>
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
  
  <div class="slider">
    <div><img class="lib_pic" src="../Public/Images/Library1.jpg"></div>
    <div><img class="lib_pic" src="../Public/Images/Library2.jpg"></div>
    <div><img class="lib_pic" src="../Public/Images/Library3.jpg"></div>
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

  <script>
    $('.slider').bxSlider({
        autoControls: false,
        auto: true,
        pager: false,
        mode: 'fade',
        captions: false,
        speed: 1000
    });
  </script>

</body>
</html>