<?php 

	//retrieve the form data
if ( isset($_POST["submit"])) {
	$title = $_POST["title"];
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$address = $_POST["address"];

		//echo "Hello $title $first_name $last_name $address";
		//error checking
	$errors = 0;
	if ($title == null || empty($title)) {
		$errors = 1;
	}
	if ($first_name == null || empty($first_name)) {
		$errors = 2;
	}
	if ($last_name == null || empty($last_name)) {
		$errors = 3;
	}
	if ($address== null || empty($address)) {
		$errors = 4;
	}
	
		//if errors eist, display form with previously answered data and an error message
		//otherwise insert into database, redirect
	if ($errors != 0) {
			//echo "There are errors";
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>My Form</title>
		</head>
		<body>
			<h3 style='color: red'>You have errors!</h3>
			<form action="submission.php" method="POST">
				Title: <select name="title">
					<option value=""></option>
					<option value = "Ms" 
					<?php 
					if ($title == "Ms") {
						echo " selected ";
					}
					?>
					>Ms</option>
					<option value = "Mr" 
					<?php 
					if ($title == "Mr") {
						echo " selected ";
					}
					?>
					>Mr</option>
					<option value = "Mrs" 
					<?php 
					if ($title == "Mrs") {
						echo " selected ";
					}
					?>
					>Mrs</option>
				</select>
				<?php
				if ($title == null || empty($title)) {
					echo "<font style='color: red'><B>*required</B></font>";
				}
				?>
			</br>
			First Name: <input type="text" name="first_name" value="<?php echo "$first_name"; ?>" placeholder="First Name" />
			<?php
			if ($first_name == null || empty($first_name)) {
				echo "<font style='color: red'><B>*required</B></font>";
			}
			?>
		</br>
		Last Name: <input type="text" name="last_name" value="<?php echo "$last_name"; ?>" placeholder="Last Name" />
		<?php
		if ($last_name == null || empty($last_name)) {
			echo "<font style='color: red'><B>*required</B></font>";
		}
		?>
	</br>
	Address: <input type="text" name="address" value="<?php echo "$address"; ?>" placeholder="Address" />
	<?php
	if ($address == null || empty($address)) {
		echo "<font style='color: red'><B>*required</B></font>";
	}
	?>
</br>
<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>
<?php 
} else {
			//echo "There are no errors";
}



} else {
	echo "Must submit form";
}

?>	
