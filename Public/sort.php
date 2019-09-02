<?php 
	include('..//Private/configuration.php');
	
	if(isset($_POST['column']) && isset($_POST['sortOrder'])){
        
        $columnName = str_replace(" ","_",strtolower($_POST['column']));
		$sortOrder  = $_POST['sortOrder'];
		
		$query = "SELECT * FROM `books` ORDER BY ".$columnName." ".$sortOrder;
		$result = $db->query($query);
		
		while($book = $result->fetch_assoc()){
                
            echo "<tr>";
				echo "<td>".$book['title']."</td>";
				echo "<td>".$book['author']."</td>";
				echo "<td>".$book['section']."</td>";
			echo "</tr>";
		}
	}
?>
