<?php
//check_add.php

	//get values from form
	$field1 = $_POST["field1"];

	//error check
	$errors = 0;
	if (empty($field1)) $errors = 1;

	//if errors, show form with entered values
	if ($errors != 0) {
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="check_add.php" method="post">
	Field: <input type="text" name="field1" value="<?php echo $field1; ?>" placeholder="Enter value" />
<?php 
if (empty($field1)) {
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

	$sql = "INSERT INTO formtable (field1) VALUES ('$field1')";
	mysqli_query($conn, $sql);

	mysqli_close($conn);

	header('Location: viewfields.php');

	}
?>