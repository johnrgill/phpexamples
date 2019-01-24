<?php 

	//error_reporting(0);
	//connection to database 
	$dbHost = "localhost";
	$dbUser = "homestead";
	$dbPass = "secret";
	error_reporting(0);
	//4th param is option, would be database name but we are creating one
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass); 

	if (!$conn) {
		die("connection failed: ".mysqli_connect_error());
	}



	//create a db if it doesn't already exist
	$sql = "CREATE DATABASE IF NOT EXISTS assignment3";
	mysqli_query($conn, $sql);



	mysqli_close($conn);
	//======================CREATING A TABLE==============================\\
	$dbName = "assignment3";
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	if (!$conn) {
		die("connection failed: ".mysqli_connect_error());
	}

	$sql = "CREATE TABLE IF NOT EXISTS registered_users (
			user_id int(11) NOT NULL AUTO_INCREMENT,
			title varchar(100) NOT NULL,
			firstName varchar(100) NOT NULL,
			lastName varchar(100) NOT NULL,
			streetAddress varchar(255) NOT NULL,
			billingCity varchar(100) NOT NULL,
			billingProvince varchar(100) NOT NULL,
			billingPostal varchar(20) NOT NULL,
			billingCountry varchar(100) NOT NULL,
			phoneNumber varchar(100) NOT NULL,
			email varchar(20) NOT NULL,
			newsletter varchar(100) NOT NULL,
			PRIMARY KEY (user_id) ) CHARSET=utf8";

	mysqli_query($conn, $sql) or die (mysqli_error());

		//retrieve the form data
if ( isset($_POST["submit"])) {
	$title = $_POST["title"];
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$streetaddress = $_POST["street"];
	$city = $_POST["city"];
	$province = $_POST["province"];
	$postalcode = $_POST["postalcode"];
	$country = $_POST["country"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$newsletter = $_POST["newsletter"];

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
	if ($streetaddress== null || empty($streetaddress)) {
		$errors = 4;
	}
	if ($city == null || empty($city)) {
		$errors = 5;
	}
	if ($province == null || empty($province)) {
		$errors = 6;
	}
	if ($postalcode == null || empty($postalcode)) {
		$errors = 7;
	}
	if ($country == null || empty($country)) {
		$errors = 8;
	}
	if ($phone == null || empty($phone)) {
		$errors = 9;
	}
	if ($email == null || empty($email)) {
		$errors = 10;
	}
	//if ($newsletter == null || empty($newsletter)) {
	//	$errors = 11;
	//}
	//throw values into db if submit
	if ( isset($_POST["submit"])) {
		$sql = "INSERT into registered_users (title, firstName, lastName, streetAddress, billingCity, billingProvince, billingCountry, billingPostal, phoneNumber, email, newsletter ) VALUES ('$title', '$first_name', '$last_name', '$streetaddress', '$city', '$province', '$country', '$postalcode', '$phone', '$email', $newsletter) ";
			echo $sql;
			mysqli_query($conn, $sql) or die (mysqli_error($conn));
	}
	
}
if ( !isset($_POST["submit"]) || $errors != 0) {
	?>
	
	<h1>assignment 3</h1>
	<?php if ( isset($_POST["submit"])) { echo"<h3 style='color: red'>You have errors!".$errors."</h3>"; } ?>
	<form action="assignment3.php" method="POST">
	Title:<select name="title">
		<option value=""></option>
		<option value="mr"
		<?php 
				if ($title == "mr") {
					echo " selected ";
				}?>
				>Mr</option>
		<option value="mrs"
		<?php 
				if ($title == "mrs") {
					echo " selected ";
				}?>
				>Mrs</option>
		<option value="ms"
		<?php 
				if ($title == "ms") {
					echo " selected ";
				}?>
				>Ms</option>
		<option value="doctor"
		<?php 
				if ($title == "dr") {
					echo " selected ";
				}?>
				>Dr</option>
	</select> 
	<?php
		if (isset($title) && ($title == null || empty($title))) {
			echo "<font style='color: red'><B>*required</B></font>";
		}
	?>
	 <br>
	  First name:
	  <input type="text" name="first_name" "<?php echo "$first_name"; ?>">
	  <?php
			if (isset($first_name) && ($first_name == null || empty($first_name))) {
				echo "<font style='color: red'><B>*required</B></font>";
			}
		?>
		<br>
	  Last name:
	  <input type="text" name="last_name" value="<?php echo "$last_name"; ?>">
	  <?php
			if (isset($last_name) && ($last_name == null || empty($last_name))) {
			echo "<font style='color: red'><B>*required</B></font>";
			}
		?>
		<br>
	  Street Address:
	  <input type="text" name="street" value="<?php echo "$streetAddress"; ?>">
	  <?php
	  	if (isset($streetaddress) && ($streetaddress== null || empty($streetaddress))) {
			echo "<font style='color: red'><B>*required</B></font>";
			}
	?>
	<br>
	  City:
	  <input type="text" name="city" value="<?php echo "$city"; ?>">
	  <?php
	  	if (isset($city) && ($city== null || empty($city))) {
			echo "<font style='color: red'><B>*required</B></font>";
			}
		?>
		<br>
	  Province:
	  <input type="text" name="province" value="<?php echo "$province"; ?>">
	  <?php
	  	if (isset($province) && ($province== null || empty($province))) {
			echo "<font style='color: red'><B>*required</B></font>";
			}
		?>
		<br>
	  Postal code:
	  <input type="text" name="postalcode" value="<?php echo "$postalcode"; ?>">
	  <?php
	  	if (isset($postalcode) && ($postalcode== null || empty($postalcode))) {
			echo "<font style='color: red'><B>*required</B></font>";
			}
		?>
		<br>
	  Country:
	  <select name="country">
	  	<option value=""></option>
	  	<option value="canada"
	  	<?php
	  	 if ($country == "canada") {
	  	 	echo"canada selected";}
	  	?>
	  	>Canada</option>
	  	<option value="usa"
	  	<?php
	  	 if ($country == "usa") {echo"usa selected";}
	  	?>
	  	>USA</option>
	  </select><br>
	  <?php
			if (isset($country) && ($country == null || empty($country))) {
				echo "<font style='color: red'><B>*required</B></font>";
			}
		?>
		</br>
	  Phone:
	  <input type="text" name="phone" value="<?php echo "$phone"; ?>"><br>
	  <?php
	  	if (isset($phone) && ($phone== null || empty($phone))) {
			echo "<font style='color: red'><B>*required</B></font>";
			}
		?>
		<br>
	  Email:
	  <input type="text" name="email" value="<?php echo "$email"; ?>"><br>
	  <?php
	  	if (isset($email) && ($email== null || empty($email))) {
			echo "<font style='color: red'><B>*required</B></font>";
			}
		?>
		<br>
	  Newsletter:
	  <input type="checkbox" id="newsletter" name="newsletter"
               value="1" />
        <label for="newsletter">News Letter Subscription</label>
    <br />
	  <input type="submit" name="submit" />
	</form>
<?php
	}

	$sql = "SELECT * FROM registered_users";
	$result = mysqli_query($conn, $sql);
?>
<table>
	<tr>
		<th>User ID</th>
		<th>Title</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Street Address</th>
		<th>City</th>
		<th>Province</th>
		<th><B>Postal Code</B></th>
		<th><B>Country</B></th>
		<th><B>Phone</B></th>
		<th><B>Email</B></th>
		<th><B>Newsletter</B></th>
	</tr>
<?php

	while( $row = mysqli_fetch_assoc($result)) {
		$id = $row['user_id'];
		$title = $row['title'];
		$first_name = $row['firstName'];
		$last_name = $row['lastName'];
		$streetaddress = $row['streetAddress'];
		$city = $row['billingCity'];
		$province = $row['billingProvince'];
		$postalcode = $row['billingPostal'];
		$country = $row['billingCountry'];
		$phone = $row['phoneNumber'];
		$email = $row['email'];
		$newsletter = $row['newsletter'];
		echo"
		<tr>
			<td><B>$id</B></td>
			<td><B>$title</B></td>
			<td><B>$first_name</B></td>
			<td><B>$last_name</B></td>
			<td><B>$streetaddress</B></td>
			<td><B>$city</B></td>
			<td><B>$province</B></td>
			<td><B>$postalcode</B></td>
			<td><B>$country</B></td>
			<td><B>$phone</B></td>
			<td><B>$email</B></td>
			<td><B>$newsletter</B></td>
		</tr>
		";
		



	}
		
?>
</table>