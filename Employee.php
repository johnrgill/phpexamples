<?php 
	include("Person.php");
	class Employee extends Person{
		private $hoursWorked;
		private $rateOfPay;

		function getHoursWorked() {
			return $this->hoursWorked;
		}
		function getRateOfPay() {
			return $this->rateOfPay;
		}
		function setHoursWorked($temp) {
			$this->hoursWorked = $temp;
		}
		function setRateOfPay($temp) {
			$this->rateOfPay = $temp;
		}
		function __construct(){
			$parameter = func_get_args();
			if (count($parameter) == 6) {
				parent::__construct($parameter[0],$parameter[1],$parameter[2],$parameter[3]);
				$this->hoursWorked = $parameter[4];
				$this->rateOfPay = $parameter[5];
			}
			elseif(count($parameter) == 4) {
				parent::__construct($parameter[0],$parameter[1],$parameter[2],$parameter[3]);
				$this->hoursWorked = 0;
				$this->rateOfPay = 0.0;
			}
			elseif(count($parameter) == 2) {
				parent::__construct($parameter[0],$parameter[1]);
				$this->id = 0;
				$this->address = "";
				$this->hoursWorked = 0;
				$this->rateOfPay = 0.0;

			} else {
				$this->id = 0;
				$this->firstName = "";
				$this->lastName = "";
				$this->address = "";
				$this->hoursWorked = 0;
				$this->rateOfPay = 0.0;
			}	

		}
		function __destruct() {

		}
		function display() {
			echo "id: ".$this->id."<br/>";
			echo "First Name: ".$this->firstName."<br/>";
			echo "Last Name: ".$this->lastName."<br/>";
			echo "address: ".$this->address."<br/>";
			echo "Rate of pay: ".$this->rateOfPay."<br/>";
			echo "Hours Wocked: ".$this->hoursWorked."<br/>";
		}
	}

 ?>