<?php
//editform.php
	include 'dbinfo.php';
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	$id = $_POST['id'];
	$id = mysqli_real_escape_string($conn, $id);

	$itemFound = false;
	//retrieve the value to edit
	$sql = "SELECT * FROM formtable 
	        WHERE id='$id'"; 
	$result = mysqli_query($conn, $sql);        
	while ( $row = mysqli_fetch_assoc($result))  
	{
		$id = $row['id'];
		$field = $row['field1'];
		$itemFound = true;
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	if ($itemFound) {
?>
Warning you are about to delete the following record: <br />Field = <?php echo $field; ?><br />
<form action="deleteform.php" method="post">
	<input type='hidden' name='id' value='<?php echo $id; ?>'>
	<input type="submit" name="delete" 
	value="Delete" />
</form><br />
<form action="viewfields.php" method="get">
	<input type="submit" name="return" 
	value="Go Back" />
</form><br />
<?php 
	} else {
		echo 'no match';
	}
?>
</body>
</html>