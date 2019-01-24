<?php
	//viewfields.php
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
<a href='add_category.php'>+add a new category</a>
<br /><br />
all categories
<table>
	<tr><td>category</td><td colspan="2">actions</td></tr>
<?php
	include 'dbinfo.php';

	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	$sql = "SELECT * FROM categories order by cat_name DESC"; 
	$result = mysqli_query($conn, $sql);        
	while ( $row = mysqli_fetch_assoc($result) ) {
			$id = $row['id'];
			$field = $row['cat_name'];
			echo "<tr><td>".$field."</td>";
echo "<td><a href='edit_category.php?id=".$id."'>
	          edit</a></td>";
echo "<td><form action='check_delete_category.php'
                method='post'>
<input type='hidden' name='id' value='$id' />
</form></td></tr>";
		}

	mysqli_close($conn);
?>
</table>



</body>
</html>