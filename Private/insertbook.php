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
  
    if (isset($_POST['title'])){
    
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $author = mysqli_real_escape_string($db, $_POST['author']);    
        $section = mysqli_real_escape_string($db, $_POST['section']); 
       
        $query = "INSERT into `books` (title, author, section)
                        VALUES ('$title', '$author', '$section')";
                
                $result = $db->query($query);
                
                if($result){
                    echo "<div class='form'>
                    <h3>You added new book successfully.</h3>
                    <br/><a href='books.php'>Click here to continue.</a></div>";
          }
  } else{
?>
<div id="insertbook" class="container">
  <h2>Adding Book</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="title" class="form-control" id="title" placeholder="Enter title" name="title">
    </div>
    <div class="form-group">
      <label for="author">Author:</label>
      <input type="author" class="form-control" id="author" placeholder="Enter author" name="author">
    </div>
    <div class="form-group">
      <label for="section">Section:</label>
      <input type="section" class="form-control" id="section" placeholder="Enter section" name="section">
    </div>
    
    <button style="width:80px;" type="submit" class="btn btn-primary">Add</button>
  </form>
</div>
<?php } ?>
</body>
</html>
