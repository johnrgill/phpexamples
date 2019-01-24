<?php
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Assignment 1</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<style type="text/css">
			body {
			
				background-color: #564946;
				color: #69EBD0;
				font-family: 'Roboto';
			}
			.fancy {
				margin-left: 250px;
				border-width: 10px;
				border-color: #558564;
				border-style: solid;
				border-radius: 25px;
				padding-left: 50px;
				max-width: 50%;
			}
			.top {
				background-color: #558564;
				width: 100%;
			}
		</style>
	</head>
	<body>
		<h1 class="top">Part 1</h1>
		<div class="fancy">
		<h2>Ceiling</h2>
		<p>Enter a number</p>
			<form action="assignment1.php" method="POST">
				<input type="text" name="number1"><br />
				<input type="submit">
			</form>
			<?php 
					$number1 = $_POST["number1"];
					echo "<p>Ceiling: ".ceil($number1). "</p>"; 
			?>
		</div>
			<br />
			<br />
		<div class="fancy">	
			<h2>Floor</h2>
			<p>Enter second number</p>
			<form action="assignment1.php" method="POST">
				<input type="text" name="number2"><br />
				<input type="submit">
			</form>
			<?php
				$number2 = $_POST["number2"];
				echo "<p>Floor: ".floor($number2)."</p>";
			?>
		</div>
		<br />
		<br />
		<div class="fancy">
			<h2>Round</h2>
			<p>Enter a number</p>
			<form action="assignment1.php" method="POST">
				<input type="text" name="number3"><br />
				<input type="submit">
			</form>
			<?php 
					$number3 = $_POST["number3"];
					echo "<p>Round: ".round($number3). "</p>"; 
			?>
		</div>
		<br />
		<br />
		<h1 class="top">Part 2</h1>
		<div class="fancy">
			<h2>Date</h2>
			<p>Enter a Date yyyy-mm-dd</p>
			<form action="assignment1.php" method="POST">
				<input type="text" name="date1"><br />
				<input type="submit">
				<br /><br />
			</form>
			<?php 
				$date1 = $_POST["date1"];
				if (isset($date1)) {
					$datetime1 = new DateTime($date1);
					$datetime2 = new DateTime('2016-06-30');
					$interval = $datetime2->diff($datetime1);
					echo "<p>Difference: ".$interval->format('%R%a days')."</p>";
				}
			?>
		</div>
		<br />
		<br />
		<h1 class="top">Part 3</h1>
		<div class="fancy">
			<h2>Numbers</h2>
			<p>Enter two numbers</p>
			<form action="assignment1.php" method="POST">
				<input type="text" name="number4"><br />
				<input type="text" name="number5"><br />
				<input type="submit">
				<br /><br />
			</form>
			<?php
				$number4 = $_POST["number4"];
				$number5 = $_POST["number5"];
				function addThem($num1, $num2) {
					$num3 = $num1 + $num2;
					echo "<p>Addition: ".$num1." + ".$num2." = ".$num3."</p>";
				}
				function subtractThem($num1, $num2){
					$num3 = $num1 - $num2;
					echo "<p>Subtraction: ".$num1." - ".$num2." = ".$num3."</p>";
				}
				function multiplyThem($num1, $num2){
					$num3 = $num1 * $num2;
					echo "<p>Multiplication: ".$num1." * ".$num2." = ".$num3."</p>";
				}
				if (isset($number4)) {
					addThem($number4, $number5);
					subtractThem($number4, $number5);
					multiplyThem($number4, $number5);
				}
			?>
		</div>
	</body>
</html>