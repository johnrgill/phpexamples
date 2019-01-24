<?php
error_reporting(0);
//variables
$name = $_POST['name'];
$email = $_POST['email'];

if (isset($name) && isset($email)){
	unset($_COOKIE['testCookie']);
	setcookie('cookieName', $name);
	setCookie('cookieEmail', $email);
	//set newNum to 1 so message doesn't display
	$newNum = 1;
	//this doesn't work until you refresh again for some reason
	echo $_COOKIE['cookieName'];
	echo "</br>";
	echo $_COOKIE['cookieEmail'];
} 

//set cookie testCookie with value 0 to start 

setcookie('testCookie', 0);
//if it's not set, set it 
if (!isset($_COOKIE['testCookie'])){
	setcookie('testCookie', 0);
} else {
	//if it is set, increment the value by 1
	$newNum = $_COOKIE['testCookie'] + 1;
	setcookie('testCookie', $newNum);
}
//display msg on every 3rd visit
if ($newNum % 3 == 0 && $newNum != 0) {
	echo"don't forget to register!";
}

?>
<form method="POST">
	name:<input type="text" name="name">
	email:<input type="text" name="email">
	<input type="submit" name="submit">
</form>
