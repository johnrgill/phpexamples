<?php
	
	$animals = array("cat", "dog", "horse", "moose", "fish", "cow", "donkey", "camel");


	//print values in array (or another complex data type)
	//print_r($animals);

	//count() returns the number of items in an array
	$number_of_animals = count($animals);
	echo "we have ".$number_of_animals." animals";
	echo "<br />";

	//if statement shortcut
	echo ($number_of_animals == 1) ? "We have ".$number_of_animals." animal" : "We have ".$number_of_animals." animals";

	//push value to array 
	array_push($animals, "rat", "ghoul", "ghost");

	//loop through dat array
	for ($i = 0; $i < count($animals); $i ++) {
		echo "<br />".$i.": ".$animals[$i];
	}


	//explode function turns a string into an array using a delimiter
	$myName = "Homer Jay Simpson";
	$name_array = explode(" ", $myName);
	print_r($name_array);
	//simple switch to determine if it's first/last name etc etc
	switch (count($name_array) ) {
		case '1':
			$last_name = $name_array[0];
			break;
		case '2':
			$first_name = $name_array[0];
			break;
		case '3':
			$first_name = $name_array[0];
			$middle_name = $name_array[1];
			$last_name = $name_array[2];
			break;
		default:
			//blah
			break;
	}
	echo "<br/>".$first_name." ".$middle_name." ".$last_name;
?>