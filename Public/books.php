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

<p>Enter the book you want to search:</p>
<form class="form-inline mr-auto" action="search.php" method="post">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search..." id="search" name="search" aria-label="Book search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </div>
</form>
<h5>Click on the headings, if you want to sort results!</h5> 
  <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th  class="sort-heading" id="title-asc">Title</th>
                    <th  class="sort-heading" id="author-asc">Author</th>
                    <th  class="sort-heading" id="section-asc">Section</th>
                </tr>
            </thead>
            <?php 
            include('../Private/configuration.php');
            
            $query = "SELECT * FROM `books` ORDER BY `title`";
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

    <?php include('footer.php') ?>
</body>
</html>  
<script>
	$(document).ready(function(){
		$(".sort-heading").click(function(){
			
			var getSortHeading = $(this);
			var getNextSortOrder = getSortHeading.attr('id');
			
			var splitID = getNextSortOrder.split('-');
			
			var splitIDName = splitID[0];
			var splitOrder = splitID[1];
			
			var getColumnName = getSortHeading.text();
			
			
			$.ajax({
				url:'sort.php',
				type:'post',
				data:{'column':getColumnName,'sortOrder':splitOrder},
				success: function(response){
					if(splitOrder == 'asc'){
						
            getSortHeading.attr('id',splitIDName+'-desc');
					}
					else{
						
            getSortHeading.attr('id',splitIDName+'-asc');
					}	
					
					$(".table tr:not(:first)").remove();
					$(".table").append(response);
				}
			});
			
		});
	});
</script>
