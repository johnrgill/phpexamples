<?php

	//associative array
	//Strings instead of indexes
	$ages = array("Peter" => "35", "Ben" => "37", "Joe" => "43", "MJ" => "22");
	foreach ($ages as $key => $value) {
		echo "<br />".$key.": ".$value;
	}
	echo "<br /><br />";
	//foreach still works for reg arrays
	$animals = array("cat", "dog", "horse", "moose", "fish", "cow", "donkey", "camel");
	foreach($animals as $key => $value) {
		echo "<br />".$key.": ".$value;
	}
	echo "<br /><br />";
	asort($ages);
	foreach($ages as $key => $value) {
		echo "<br />".$key.": ".$value;
	}

?>