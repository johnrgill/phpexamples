<?php 
error_reporting(0);
	//retrieve the form data
if ( isset($_POST["submit"])) {
	$title = $_POST["title"];
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$address = $_POST["address"];
	$fileName = basename($_FILES["fileToUpload"] ["name"]);

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
	if ($fileName== "") {
		$errors = 5;
	}
}	
		//if errors eist, display form with previously answered data and an error message
		//otherwise insert into database, redirect
if ( !isset($_POST["submit"]) || $errors != 0) {
			//echo "There are errors";
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>My Form</title>
		<style>body {
			background-color: black;
			color: #32CD32;
			font-family: "Courier New";
			text-align: left;
			font-size: 30px;
			}
			form {
				padding-left: 600px;
				padding-top: 50px;
				border-style: solid;
				border-color: white;
				border-radius: 25px;			
			}
		</style>
	</head>
	<body>
		<?php if ( isset($_POST["submit"])) { echo"<h3 style='color: red'>You have errors!".$errors."</h3>"; } ?>
		<form action="myForm.php" method="POST" enctype="multipart/form-data">
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
				if (isset($title) && ($title == null || empty($title))) {
					echo "<font style='color: red'><B>*required</B></font>";
				}
			?>
			</br>
		First Name: <input type="text" name="first_name" value="<?php echo "$first_name"; ?>" placeholder="First Name" />
		<?php
		if (isset($first_name) && ($first_name == null || empty($first_name))) {
			echo "<font style='color: red'><B>*required</B></font>";
		}
		?>
	</br>
		Last Name: <input type="text" name="last_name" value="<?php echo "$last_name"; ?>" placeholder="Last Name" />
		<?php
			if (isset($last_name) && ($last_name == null || empty($last_name))) {
			echo "<font style='color: red'><B>*required</B></font>";
			}
		?>
	</br>
		Address: <input type="text" name="address" value="<?php echo "$address"; ?>" placeholder="Address" />
		<?php
			if (isset($address) && ($address == null || empty($address))) {
				echo "<font style='color: red'><B>*required</B></font>";
			}
		?>
	</br>
		File: <input type="file" name = "fileToUpload">
		<?php
			if (isset($fileName) && $fileName == "") {
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
			$target_dir = "uploads/";
			$target = $target_dir . $fileName;
			if (move_uploaded_file($_FILES ["fileToUpload"] ["tmp_name"], $target)) {

				echo "File has been uploaded";

			} else {
				echo "Error uploading file";
			}

		}


	?>	
