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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php include('adminheader.php'); ?>

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
        
        $query = "SELECT * FROM `books` WHERE title = '$title'";
        $result = $db->query($query);
        $rows = mysqli_num_rows($result);
        if($rows == 1){
          echo 
            "<div id='minh'>
              <h3>You already have a book with that title.</h3>
              <a data-toggle='tooltip' title='Click here to go back.' href='books.php' style='width:80px;' role='button' class='btn btn-primary'>Back</a>
            </div>";
        } else{
        
                $query = "UPDATE `books` SET title = '$title', author = '$author', section = '$section' WHERE id = '$id'";
                            
                $result = $db->query($query);
                
                if($result){
                    echo 
                      "<div id='minh'>
                        <h3>You edited book successfully.</h3>
                        <a data-toggle='tooltip' title='Click here to continue.' href='books.php' style='width:80px;' role='button' class='btn btn-success'>Back</a>
                      </div>";
                }
          }
    } else{
?>
<div id="editbook" class="container">
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
    
    <button style="width:80px;" type="submit" class="btn btn-success">Done</button>
  </form>
</div>
<?php } ?>

<?php include('adminfooter.php'); ?>
</body>
</html> 
