<?php
require 'connect.inc.php';

	if(isset($_POST['search_name'])) {
		
		$search_name = $_POST['search_name'];
		if (!empty($search_name)) {
			
			$query = "SELECT name FROM names WHERE name LIKE '%".mysql_real_escape_string($search_name)."%'";	
			$query_run = mysql_query($query);
			$mysql_num_rows = mysql_num_rows($query_run);
			if ($mysql_num_rows>=1) {
					echo $mysql_num_rows.' Results found:<br>';
					while ($query_row = mysql_fetch_assoc($query_run)) {
					echo $query_row['name'].'<br>';	
					}
					
			}else {
				echo 'No results found';	
			}
		}
	}

?>

<form action ="index.php" method="POST">
	Name: <input type="text" name="search_name"> <input type="submit" value="search">
</form>