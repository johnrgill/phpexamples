<?php
//check_add.php

	$dbHost = "127.0.0.1:8889";
	$dbUser = "root";
	$dbPass = "root";
	$dbName = "project";
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	//get values from form
	$id = $_POST["id"];
	$field1 = $_POST["field1"];

	$id = mysqli_real_escape_string($conn, $id);
	$field1 = mysqli_real_escape_string($conn, $field1);

	//error check
	$errors = 0;
	if (empty($field1)) $errors = 1;
	if (empty($id)) $errors = 2;

	//if errors, show form with entered values
	if ($errors != 0) {
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="check_save.php" method="post">
	<input type='hidden' name='id' value='<?php echo $id; ?>'>
	Field: <input type="text" name="field1" value="<?php echo $field1; ?>" placeholder="Enter value" />
<?php 
if (empty($field1)) {
  echo "<B><font color='red'>*required</B>";
}
?>
	<br/>
	<input type="submit" name="submit" 
	value="Save" />
</form>
</body>
</html><?php
	} else {

	//else update in DB and redirect to overview page
	include 'dbinfo.php';

	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	$sql = "UPDATE formtable SET field1='$field1' WHERE id='$id'";
	mysqli_query($conn, $sql);

	mysqli_close($conn);

	header('Location: viewfields.php');

	}
?>