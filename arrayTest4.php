<?php

	$people = array(
		array('spiderman', 'Peter Parker'),
		array('black widow','Natasha Romanov'),
		array('iron man', 'Tony Stark')
	);

	for ($i = 0; $i < count($people); $i++) {
		for ($j = 0; $j < count($people[$i]); $j++) {
			echo $i."/".$j.": ".$people[$i][$j]."<br />";
		}
	}
?>