<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul><li><a href="index.html">home</a></li>
	<li><a href="add_category.php">add category</a></li>
	<li><a href="view_categories.php">view categories</a></li>
	<li><a href="add_item.php">add item</a></li>
	<li><a href="view_items.php">view items</a></li>
</ul>
<a href='add_item.php'>+add a new item</a>
<br /><br />
all items
<table>
	<tr><td>item</td><td colspan="2">actions</td></tr>
<?php
	include 'dbinfo.php';

	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	$sql = "SELECT * FROM items order by title DESC"; 
	$result = mysqli_query($conn, $sql);        
	while ( $row = mysqli_fetch_assoc($result) ) {
			$id = $row['id'];
			$field = $row['title'];
			echo "<tr><td>".$field."</td>";
echo "<td><a href='edit_item.php?id=".$id."'>
	          edit</a></td>";
echo "<td><form action='check_delete_item.php'
                method='post'>
<input type='hidden' name='id' value='$id' />
</form></td></tr>";
		}

	mysqli_close($conn);
?>
</table>



</body>
</html>