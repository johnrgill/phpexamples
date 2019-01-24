<?php
	//viewfields.php
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href='addform.php'>+add a new field</a>
<br /><br />
All Fields
<table>
	<tr><td>field</td><td colspan="2">Actions</td></tr>
<?php
	include 'dbinfo.php';

	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	$sql = "SELECT * FROM formtable order by field1 DESC"; 
	$result = mysqli_query($conn, $sql);        
	while ( $row = mysqli_fetch_assoc($result) ) {
			$id = $row['id'];
			$field = $row['field1'];
			echo "<tr><td>".$field."</td>";
echo "<td><a href='editform.php?id=".$id."'>
	          edit</a></td>";
echo "<td><form action='check_delete_form.php'
                method='post'>
<input type='hidden' name='id' value='$id' />
<input type='submit' name='submit' value='Delete' />
</form></td></tr>";
		}

	mysqli_close($conn);
?>
</table>



</body>
</html>