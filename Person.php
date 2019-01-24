<?php 
	//storage class for PERSON
	//steps:
	//1. create the class structure
	//2. declare your data members (attributes, variables)
	//3. getts n setters 
	//4. add a constructor to your class
	//5. display function
	//6. any other function
	//7. test in a program

	class Person {
		protected $id;
		protected $firstName;
		protected $lastName;
		protected $address;
		function getID() {
			return $this->id;
		}
		function getFirstName() {
			return $this->firstName;
		}
		function getLastName() {
			return $this->lastName;
		}
		function getAddress() {
			return $this->address;
		}
		function setID($temp) {
			$this->id = temp;
		}
		function setFirstName($temp) {
			$this->firstName = $temp;
		}
		function setLastName($temp) {
			$this->lastName = $temp;
		}
		function setAddress($temp) {
			$this->address = $temp;
		}
		function __construct() {
			$parameter = func_get_args();
			if (count($parameter) == 4) {
				$this->id = $parameter[0];
				$this->firstName = $parameter[1];
				$this->lastName = $parameter[2];
				$this->address = $parameter[3];

			} 
			elseif(count($parameter) == 2) {
				$this->id = 0;
				$this->firstName = $parameter[0];
				$this->lastName = $parameter[1];
				$this->address = "";
			} else {
				$this->id = 0;
				$this->firstName = "";
				$this->lastName = "";
				$this->address = "";

			}
		}
		function __destruct() {

		}
		function display() {
			echo "id: ".$this->id."<br/>";
			echo "First Name: ".$this->firstName."<br/>";
			echo "Last Name: ".$this->lastName."<br/>";
			echo "address: ".$this->address."<br/>";
		}
	}

	

 ?>