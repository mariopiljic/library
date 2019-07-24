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
  
  $id = $_GET['id'];
  $id = mysqli_real_escape_string($db, $id);
  $query = "SELECT * FROM `books` WHERE id = '$id'";
  $result = $db->query($query);
  $book = $result->fetch_array();
  
    if (isset($_POST['title'])){
      
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $author = mysqli_real_escape_string($db, $_POST['author']);    
        $section = mysqli_real_escape_string($db, $_POST['section']); 
       
        $query = "UPDATE `books` SET title = '$title', author = '$author', section = '$section' WHERE id = '$id'";
                            
                $result = $db->query($query);
                
                if($result){
                    echo "<div class='form'>
                    <h3>You edited book successfully.</h3>
                    <br/><a href='books.php'>Click here to continue.</a></div>";
          }
  } else{
?>
<div class="container">
  <h2>Editing Book</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="title" class="form-control" id="title" placeholder="<?php echo htmlspecialchars($book['title']); ?>" name="title">
    </div>
    <div class="form-group">
      <label for="author">Author:</label>
      <input type="author" class="form-control" id="author" placeholder="<?php echo htmlspecialchars($book['author']); ?>" name="author">
    </div>
    <div class="form-group">
      <label for="section">Section:</label>
      <input type="section" class="form-control" id="section" placeholder="<?php echo htmlspecialchars($book['section']); ?>" name="section">
    </div>
    
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
</div>
<?php } ?>
</body>
</html>