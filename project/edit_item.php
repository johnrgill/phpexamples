<?php
//editform.php
	include 'dbinfo.php';
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	$id = $_GET['id'];
	$id = mysqli_real_escape_string($conn, $id);
	//sql2 is here to grab the categories for the dropdown
	$sql2 = "SELECT * FROM categories";
	//retrieve the value to edit
	$sql = "SELECT * FROM items
	        WHERE id='$id'"; 
	$result = mysqli_query($conn, $sql);  
	$result2 = mysqli_query($conn, $sql2);      
	while ( $row = mysqli_fetch_assoc($result))  
	{
		$id = $row['id'];
		$category = $row['cat_name'];
		$title = $row['title'];
		$description = $row['description'];
		$price = $row['price'];
		$quantity = $row['quantity'];
		$sku = $row['sku'];
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
<form action="check_item_save.php" method="post">
	<input type='hidden' name='id' value='<?php echo $id; ?>'>
	category: <select name="categories"><?php 
 		while ($row = mysqli_fetch_assoc($result2)) {
 			echo "<option value='". $row['cat_name'] . "'/>" . $row['cat_name'] . "</option>";
 		}
 		?>
	title: <input type="text" name="title" value="<?php echo "$title" ?>"  />
	description: <input type="text" name="description" value="<?php echo "$description" ?>"  />
	price: <input type="text" name="price" value="<?php echo "$price" ?>"  />
	quantity: <input type="text" name="quantity" value="<?php echo "$quantity" ?>"  />
	sku: <input type="text" name="sku" value="<?php echo "$sku" ?>"  />
	picture: <input type="text" name="category" value="" placeholder="enter picture" />
	<br/>
	<input type="submit" name="submit" 
	value="Submit" />
</form>
</body>
</html>