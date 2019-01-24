<?php 
//connection to database 
	$dbHost = "localhost";
	$dbUser = "homestead";
	$dbPass = "secret";
	$db = "unit_7";

	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db); 

if (!$conn) {
	die("connection failed: ".mysqli_connect_error());
}
session_start();
$uid = $_SESSION['uid'];
$sessID = $_SESSION['sessID'];
$sql = "SELECT * FROM login_sessions WHERE user_id = '$uid' AND session_id = '$sessID'";
$result = mysqli_query($conn, $sql);
$timestamp = time();
if ($result->num_rows > 0){
	$sql = "UPDATE login_sessions SET last_access_time='$timestamp' WHERE user_id = '$uid' AND session_id = 'sessID'";
	mysqli_query($conn, $sql);
	echo"welcome to the admin page!";
	} else {
		header('Location: /assignment5/index.html');
	}
	
 ?>