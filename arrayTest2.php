<?php
	$animals = array("cat", "dog", "horse", "moose", "fish", "cow", "donkey", "camel");

	print_r($animals);

	$breaks = "<br /><br /><br />";
	echo $breaks;
	//sort them animals. 
	sort($animals);
	print_r($animals);

	echo $breaks;
	//unset deletes an item in array without updating the index
	unset($animals[2]);
	print_r($animals);
	echo $breaks;

	//array_values resets the indexes of an array
	$animals = array_values($animals);
	print_r($animals);

	//returns the array without any duplicates. auto unset on anything that is repeated. need to regenerate the indexes after
	$animals = array_unique($animals);
?>