<?php
//editform.php
	include 'dbinfo.php';
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	$id = $_GET['id'];
	$id = mysqli_real_escape_string($conn, $id);
	//$name = mysqli_real_ecape_string($conn, $name);

	//retrieve the value to edit
	$sql = "SELECT * FROM categories 
	        WHERE id='$id'"; 
	$result = mysqli_query($conn, $sql);        
	while ( $row = mysqli_fetch_assoc($result))  
	{
		$id = $row['id'];
		$field = $row['cat_name'];
	}
	mysqli_close($conn);
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
<form action="check_category_save.php" method="post">
	<input type='hidden' name='id' value='<?php echo $id; ?>'>
	category: <input type="text" name="category" value="<?php echo "$field" ?>" placeholder="enter category" />
	<br/>
	<input type="submit" name="submit" 
	value="Submit" />
</form>
</body>
</html>