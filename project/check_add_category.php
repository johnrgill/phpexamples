<?php
//check_add.php

	//get values from form
	$category = $_POST["category"];
	echo $category;
	//error check
	$errors = 0;
	if (empty($category)) $errors = 1;

	//if errors, show form with entered values
	if ($errors != 0) {
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="check_add_category.php" method="post">
	category: <input type="text" name="category" value="<?php echo $category; ?>" placeholder="enter category" />
<?php 
if (empty($category)) {
  echo "<B><font color='red'>*required</B>";
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

	$sql = "INSERT INTO categories (cat_name) VALUES ('$category')";
	mysqli_query($conn, $sql);

	mysqli_close($conn);

	header('Location: view_categories.php');

	}
?>
