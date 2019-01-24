
<?php
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet"> 
		<title>Assignment 2</title>
		<style type="text/css">
			body {
				background-color: black;
				color: #32CD32;
				font-family: 'Press Start 2P', cursive;
			}
			.sep {
				margin: 25px;
				border: 5px solid #32CD32;
				border-radius: 15px;
				padding: 20px;
				max-width: 20%;
			}
			.top {
				margin-left: 50px;
			}
			img {
				float: right;
				margin-right: 20%;
				border-radius: 30%;
			}
		</style>
	</head>
	<body>			

		<h1 class="top">Assignment #2!</h1>
		<img src="turtlepower.jpg" />
		<div class="sep">
			<h3>Part 1</h3>
			<form action="assignment2.php" method="POST"><br />
				Enter your Grade:   <input type="text" name="grade"><br /><br />
				<input type="submit" name="submit">
				<?php
					$grade = $_POST["grade"];
					if (isset($grade)) {
						if (is_numeric($grade)) {
							if ($grade >= 85 && $grade <= 100) {
								echo"<p>".$grade." is an A!</p>";
							} elseif ($grade >= 75 && $grade <= 84.99) {
								echo"<p>".$grade." is a B!</p>";
							} elseif ($grade >= 60 && $grade <= 74.99) {
								echo"<p>".$grade." is a C!</p>";
							} elseif ($grade >= 0 && $grade <= 59.99) {
								echo"<p>".$grade." is an F!</p>";
							} else {
								echo"<p>".$grade." is not a valid grade</p>";
							}
						} else {
							switch($grade) {
							case "A":
								echo"<p>A is in the range 85-100!</p>";
								break;
							case "B":
								echo"<p>B is in the range 75-84.99!</p>";
								break;
							case "C":
								echo"<p>C is in the range 60-74.99!</p>";
								break;
							case "F":
								echo"<p>D is in the range 0-59.99!</p>";
								break;
							default: 
								echo"<p>".$grade." is not a valid grade</p>";
							}
						}
					} 
				?>
			
			</form>
		</div>


		<div class="sep">
			<h3>Part 2</h3>
			<form action="assignment2.php" method="POST"><br />
				Choose your size!:<br /> <br />
				<select name="size">
					<option value="small">Small</option>
					<option value="medium">Medium</option>
					<option value="large">Large</option>
					<option value="extra-large">Extra Large</option>
				</select> <br /><br />
					Choose your toppings!<br /> <br />
					<input type="checkbox" name="topping1" value="pepperoni">Pepperoni!<br>
					<input type="checkbox" name="topping2" value="cheese">Cheese!<br>
					<input type="checkbox" name="topping3" value="olive">Olive!<br> 
					<input type="checkbox" name="topping4" value="pineapple">Pineapple!<br>
					<input type="checkbox" name="topping5" value="ham">Ham!<br> 
				<input type="submit" name="submit">
			</form>
			<?php
				$size = $_POST["size"];
				$price = 0;
				$topping1 = $_POST["topping1"];
				$topping2 = $_POST["topping2"];
				$topping3 = $_POST["topping3"];
				$topping4 = $_POST["topping4"];
				$topping5 = $_POST["topping5"];

				if (isset($size)) {
					switch ($size) {
						case "small":
							$price = 9.00;
							break;
						case "medium":
							$price = 12.50;
							break;
						case "large":
							$price = 15.00;
							break;
						case "extra-large":
							$price = 17.50;
							break;
						}
					if (isset($topping1)){
						$price += 1.00;
					}
					if (isset($topping3)){
						$price += 1.00;
					}
					if (isset($topping4)){
						$price += 1.00;
					}
					if (isset($topping5)){
						$price += 1.00;
					}
					echo "<p>$".number_format($price, 2, '.', '')."</p>";

				}
				


			?>
		</div>
		<?php

				$grade = $_POST["grade"];
				if (isset($grade)) {
					if ($grade == "") {
						echo "<script type='text/javascript'>alert('enter a value');</script";
					}
				}

			?>
		
	</body>
</html>