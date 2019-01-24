<?php 
	include("Person.php");
	$person1 = new Person(5, "Me", "You", "T");
	$person1->display();
	$person1->setAddress("Electric Ave");
	$person1->display();

	$person2 = new Person("Me2", "You2");
	$person3 = new Person();

	$retreived_address = $person2->getAddress();

 ?>