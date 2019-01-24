<?php 
	include("Employee.php");
	$person1 = new Employee(5, "Me", "You", "T");
	$person1->display();
	$person1->setAddress("Electric Ave");
	$person1->display();
 ?>