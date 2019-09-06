<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="library.css" rel="stylesheet">
</head>
<body>

<?php include('header.php'); ?>
  
  <?php 
            
    include('../Private/configuration.php');
    session_start();
    if (isset($_POST['search'])){
              
      $search = mysqli_real_escape_string($db, $_POST['search']);
      $query = "SELECT * FROM `books` WHERE (`title` LIKE '%$search%')";
      $result = $db->query($query);
      if(mysqli_num_rows($result) > 0){
  ?>

  <div id="minh">
      
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Section</th>
          </tr>
        </thead>
    <?php while($book = $result->fetch_assoc()){ ?>
        <tbody>
          <tr>
            <td><?php echo htmlspecialchars($book['title']); ?></td>
            <td><?php echo htmlspecialchars($book['author']); ?></td>
            <td><?php echo htmlspecialchars($book['section']); ?></td>
          </tr>
        </tbody>
  <?php } ?>
            
      </table>
  </div>
    
  <?php }else { 
      echo "<div id='minh'>
      <h3>There is no entry you have searched.</h3>
      <h3>Please try something else.</h3> </div>" ;
        } ?>
    
  <?php } ?>
  <?php include('footer.php') ?>
</body>
</html>
