<?php
//check_add.php

	//get values from form
	$category = $_POST["category"];
	$title = $_POST["title"];
	$description = $_POST["description"];
	$price = $_POST["price"];
	$quantity = $_POST["quantity"];
	$sku = $_POST["sku"];
	
	//error check
	$errors = 0;
	if (empty($category)) $errors = 1;
	if (empty($title)) $errors = 2;
	if (empty($description)) $errors = 3;
	if (empty($price)) $errors = 4;
	if (empty($quantity)) $errors = 5;
	if (empty($sku)) $errors = 6;
	if (empty($picture)) $errors = 7;

	//if errors, show form with entered values
	if ($errors != 0) {
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="check_add_item.php" method="post">
	category: <input type="text" name="category" value="<?php echo $category; ?>" placeholder="enter category" />
	title: <input type="text" name="title" value="<?php echo $title; ?>" placeholder="enter title" />
	description: <input type="text" name="description" value="<?php echo $description ?>" placeholder="enter desc" />
	price: <input type="text" name="price" value="<?php echo $price; ?>" placeholder="enter category" />
	quantity: <input type="text" name="quantity" value="<?php echo $quantity; ?>" placeholder="enter quant" />
	sku: <input type="text" name="sku" value="<?php echo $sku; ?>" placeholder="enter sku" />
	picture: <input type="text" name="picture" value="" placeholder="enter picture" />
<?php 
if ((empty($category)) || (empty($title)) || (empty($description)) || (empty($price)) || (empty($quantity)) || (empty($sku))) {
  echo "<B><font color='red'>*required field(s) missing</B>";
}
?>
	<br/>
	<input type="submit" name="submit" 
	value="Submit" />
</form>
</body>
</html><?php
	} else {

	//else insert into DB and redirect to overview page
	include 'dbinfo.php';

	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	$sql = "INSERT INTO items (cat_name, title, description, price, quantity, sku) VALUES ('$category', '$title', '$description', '$price', '$quantity', '$sku')";
	mysqli_query($conn, $sql);

	mysqli_close($conn);

	header('Location: view_items.php');

	}
?>
