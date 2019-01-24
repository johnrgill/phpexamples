<?php 
	session_start();

	$sessID = $_SESSION['sessID'];
	$sessIP = $_SESSION['sessIP'];

	echo "my session data is: ".$sessUD, "/".$sessIP;



 ?>