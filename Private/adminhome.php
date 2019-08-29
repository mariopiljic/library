
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

  <?php include('adminheader.php'); ?>
  
  <div class="slider">
    <div><img class="lib_pic" src="../Public/Images/Library1.jpg"></div>
    <div><img class="lib_pic" src="../Public/Images/Library2.jpg"></div>
    <div><img class="lib_pic" src="../Public/Images/Library3.jpg"></div>
  </div>

  <?php include('adminfooter.php'); ?>

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
