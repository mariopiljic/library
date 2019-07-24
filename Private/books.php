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
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
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
    <a href="insertbook.php"> Click here if you want to add new book! </a>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Section</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php 
            include('configuration.php');
            
            $query = "SELECT * FROM `books`";
            $result = $db->query($query);

            
            while($book = $result->fetch_assoc()){
              
            ?>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($book['id']); ?></td>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['section']); ?></td>
                    <td><a href="editbook.php?id=<?php echo htmlspecialchars($book['id']); ?>">Edit</a></td>
                    <td><a href="deletebook.php?id=<?php echo htmlspecialchars($book['id']); ?>" class="delete">Delete</a></td>
                </tr>
            </tbody>
            <?php } ?>
            
        </table>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
      $("a.delete").click(function(e){
          if(!confirm('Are you sure you want to delete this book?')){
              e.preventDefault();
              return false;
          }
            return true;
        });
    });
</script>

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
</body>
</html>  