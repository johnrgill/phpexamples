<?php
	$myNumber = 6.247567583;
	echo "My number is " .$myNumber. "<br />";
	echo "My number is " .number_format($myNumber,  2). "<br />";

	$result = $myNumber + 5;
	echo "Result is: " .$result. "<br  />";

	$result = (int)$myNumber + 5;
	echo "Result is ".$result."<br />";

	$result = (float)$myNumber + 5;
	echo "Result is ".$result."<br />";




	myFirstFunction();
	$myName = mySecondFunction("Slim", "Shady");
	echo $myName;


	function myFirstFunction() {
		echo "Hello";
	}


	function mySecondFunction($first, $last) {
		return $first." ".$last;
	}
	


?>