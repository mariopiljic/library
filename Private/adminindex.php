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
       include('configuration.php');    
       $query = "SELECT * FROM `books`";
       $result = $db->query($query);
       $row = mysqli_num_rows($result);
  ?>

  <div id="minh">
    <p>Welcome <?php echo  htmlspecialchars($_SESSION['username']); ?>!</p>
    <p>This is My Library.</p>
    <p>You are logged as admin.</p>
    <p>Currently you have <?php echo $row; ?> books.</p>
  </div>
  
  <?php include('adminfooter.php'); ?>
</body>
</html>
