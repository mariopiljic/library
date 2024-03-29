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
session_start();

$username = $_SESSION['username'];
$query = "SELECT * FROM `users` WHERE username = '$username'";
$result = $db->query($query);
$user = $result->fetch_array();

?>
<div class="table-responsive">
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
  <a data-toggle="tooltip" title="If you want to edit your profile,please click on the button." href="editMyProfile.php?id=<?php echo htmlspecialchars($user['id']); ?>" style=" width:80px;" role="button" class="btn btn-danger">Edit</a>
</div>

<?php include('adminfooter.php'); ?>
</body>
</html> 
