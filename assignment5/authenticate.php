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



if ( isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	//echo"username: ".$username;
	//echo"password: ".$password;
	//query to grab unames/pass
	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0){
		session_start();

		$sessID = session_id();
		$sql = "SELECT user_id FROM users WHERE username ='$username'";
		$result = mysqli_query($conn, $sql);
		while ($row = $result->fetch_assoc()) {
    		$uid = $row['user_id'];
    		$_SESSION['uid'] = $uid;
    		
		}
		$_SESSION['sessID'] = $sessID;	
		$timestamp = time();
		$sql = "INSERT INTO login_sessions (user_id, session_id, last_access_time) VALUES ('$uid', '$sessID', '$timestamp')";
		mysqli_query($conn, $sql);
		//echo $sessID;
		header('Location: /assignment5/admin.php');
	} else {
		header('Location: /assignment5/index.html');
	}
	

}





 ?>	