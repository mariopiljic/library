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

<?php include('header.php'); ?>

<?php

include('../Private/configuration.php');
session_start();

$username = $_SESSION['username'];
$query = "SELECT * FROM `users` WHERE username = '$username'";
$result = $db->query($query);
$user = $result->fetch_array();

?>
<div class="containe">
  <h2><?php echo htmlspecialchars($user['firstname']) ?>
      <?php echo htmlspecialchars($user['lastname']); ?>
  </h2>
  <table class="table table-bordered">
  <tr>
    <th>Firstname:</th>
    <td><?php echo htmlspecialchars($user['firstname']); ?></td>
  </tr>
  <tr>
    <th>Lastname:</th>
    <td><?php echo htmlspecialchars($user['lastname']); ?></td>
  </tr>
  <tr>
    <th>Username:</th>
    <td><?php echo htmlspecialchars($user['username']); ?></td>
  </tr>
  <tr>
    <th>Email:</th>
    <td><?php echo htmlspecialchars($user['email']); ?></td>
  </tr>
</table>
</div>
      <a href="editMyProfile.php?id=<?php echo htmlspecialchars($user['id']); ?>" style=" width:80px;" role="button" class="btn btn-danger">Edit</a>
      <p>If you want to edit your profile,please click on the button.</p>
</div>
</div>


<?php include('footer.php') ?>
</body>
</html> 
