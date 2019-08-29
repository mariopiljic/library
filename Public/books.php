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
    
  <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Section</th>
                </tr>
            </thead>
            <?php 
            include('../Private/configuration.php');
            
            $query = "SELECT * FROM `books`";
            $result = $db->query($query);
            
            while($book = $result->fetch_assoc()){
              
            ?>
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

  <?php include('footer.php'); ?>
</body>
</html>  
