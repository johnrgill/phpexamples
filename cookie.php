<?php 
	$testvalue = "change dat cookie";

	$cookie_expiry = time() + 60*60*24*30;

	setcookie('cmonster', $testvalue, $cookie_expiry, '/');

	$retrievedCookie = $_COOKIE['cmonster'];
	echo "I retrieved ".$retrievedCookie;

 ?>