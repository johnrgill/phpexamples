<?php
//editform.php
	include 'dbinfo.php';
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	$id = $_GET['id'];
	$id = mysqli_real_escape_string($conn, $id);

	//retrieve the value to edit
	$sql = "SELECT * FROM formtable 
	        WHERE id='$id'"; 
	$result = mysqli_query($conn, $sql);        
	while ( $row = mysqli_fetch_assoc($result))  
	{
		$id = $row['id'];
		$field = $row['field1'];
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="check_save.php" method="post">
	<input type='hidden' name='id' value='<?php echo $id; ?>'>
	Field: <input type="text" name="field1" value="<?php echo $field; ?>" placeholder="Enter value" />
	<br/>
	<input type="submit" name="submit" 
	value="Submit" />
</form>
</body>
</html>