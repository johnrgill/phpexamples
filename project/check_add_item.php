<?php
//check_add.php
include 'dbinfo.php';
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	//get values from form
	$categories = $_POST["categories"];
	$title = $_POST["title"];
	$description = $_POST["description"];
	$price = $_POST["price"];
	$quantity = $_POST["quantity"];
	$sku = $_POST["sku"];
	$picture = basename($_FILES["picture"]["name"]);
	//error check
	$errors = 0;
	if (empty($categories)) $errors = 1;
	if (empty($title)) $errors = 2;
	if (empty($description)) $errors = 3;
	if (empty($price)) $errors = 4;
	if (empty($quantity)) $errors = 5;
	if (empty($sku)) $errors = 6;
	if (empty($picture)) $errors = 7;

	//if errors, show form with entered values
	if ($errors != 0) {
		echo $errors;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
?>
<form action="check_add_item.php" method="post" enctype="multipart/form-data">
	category: <select name="categories"><?php 
 		while ($row = mysqli_fetch_assoc($result)) {
 			echo "<option value='". $row['cat_name'] . "'/>" . $row['cat_name'] . "</option>";
 		}
 		?>
	title: <input type="text" name="title" value="<?php echo $title; ?>" placeholder="enter title" />
	description: <input type="text" name="description" value="<?php echo $description ?>" placeholder="enter desc" />
	price: <input type="text" name="price" value="<?php echo $price; ?>" placeholder="enter category" />
	quantity: <input type="text" name="quantity" value="<?php echo $quantity; ?>" placeholder="enter quant" />
	sku: <input type="text" name="sku" value="<?php echo $sku; ?>" placeholder="enter sku" />
	picture: <input type="file" name = "picture">
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
	

	$sql = "INSERT INTO items (cat_name, title, description, price, quantity, sku) VALUES ('$categories', '$title', '$description', '$price', '$quantity', '$sku')";
	mysqli_query($conn, $sql);

	mysqli_close($conn);
	$target_dir = "uploads/";
			$target = $target_dir . $picture;
			if (move_uploaded_file($_FILES ["picture"] ["tmp_name"], $target)) {

				echo "File has been uploaded";

			} else {
				echo "Error uploading file";
			}	

	header('Location: view_items.php');

	}
?>
