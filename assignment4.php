

<?php 
	
	//assignment 4

	error_reporting(0);
	//connection to database 
	$dbHost = "localhost";
	$dbUser = "homestead";
	$dbPass = "secret";
	//error_reporting(0);
	//4th param is option, would be database name but we are creating one
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass); 

	if (!$conn) {
		die("connection failed: ".mysqli_connect_error());
	}


	$dbName = "assignment3";
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	if (!$conn) {
		die("connection failed: ".mysqli_connect_error());
	}

	$sql = "SELECT lastName from registered_users";
	$result = mysqli_query($conn, $sql);

	//declare array
	$name_array = array();
	//loop through the row to push the last name to the array
	while($row = mysqli_fetch_assoc($result)) {
 		array_push($name_array, $row['lastName']);
}
?>
<style type="text/css">
	table {
		border: 1px solid black;
	}
</style>
<table>
	<tr>
	<th>last name</th>
	</tr>

<?php
//sort the array  and then display it with foreach
sort($name_array);
 	foreach($name_array as $name) {
 		echo "<tr><td>".$name."</td></tr>"."<br>";
 	}
echo "</table>";
//second query 
$sql = "SELECT user_id, firstName, lastName from registered_users";
$result = mysqli_query($conn, $sql);

$all_users = array();
while($row = mysqli_fetch_assoc($result)) {
	$user_array = array();
	array_push($user_array, $row['user_id']);
	array_push($user_array, $row['firstName']);
	array_push($user_array, $row['lastName']);
	array_push($all_users, $user_array);
}
?>
<table>
	<tr>
<?php
//print_r($all_users);
foreach($all_users as $user) {
	foreach($user as $userdata) {
		echo "<tr><td>".$userdata."</td></tr><br>";
	}
}
?>
</table>