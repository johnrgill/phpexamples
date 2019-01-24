<?php 
	session_start();

	$sessID = session_id();

	echo "session id: ".$sessID;
	echo "<br>";
	$_SESSION['sessID'] = $sessID;


	/* this unsets the session data
		unset($_SESSION['sessID']);
	*/

	$_SESSION['sessID'] = 'Doug';

	echo "my session data is: ".$_SESSION['sessID'];
	echo "<br>";
	$timestamp = time();
	$ip = $_SERVER['REMOTE_ADDR'];
	echo "my ip is ".$ip;

 ?>