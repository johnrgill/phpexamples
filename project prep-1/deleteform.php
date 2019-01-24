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

	if (mysqli_num_rows($result) > 0) {
		$itemFound = true;
	}

	if ($itemFound) {
		$sql = "DELETE FROM formtable 
	        WHERE id='$id'"; 
	mysqli_query($conn, $sql);        

	} 
	mysqli_close($conn);
	header('Location: viewfields.php');
?>
