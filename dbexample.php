<?php
	//error_reporting(0);
	//connection to database 
	$dbHost = "localhost";
	$dbUser = "homestead";
	$dbPass = "secret";


	//4th param is option, would be database name but we are creating one
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass); 

	if (!$conn) {
		die("connection failed: ".mysqli_connect_error());
	}

	echo "connected to database";



	//create a db if it doesn't already exist
	$sql = "CREATE DATABASE IF NOT EXISTS testDB";
	mysqli_query($conn, $sql);



	mysqli_close($conn);
	//======================CREATING A TABLE==============================\\
	$dbName = "testDB";
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	if (!$conn) {
		die("connection failed: ".mysqli_connect_error());
	}

	$sql = "CREATE TABLE IF NOT EXISTS customers (
			customer_id int(11) NOT NULL AUTO_INCREMENT,
			firstName varchar(100) NOT NULL,
			lastName varchar(100) NOT NULL,
			billingAddress varchar(255) NOT NULL,
			billingCity varchar(100) NOT NULL,
			billingProvince varchar(100) NOT NULL,
			billingCountry varchar(100) NOT NULL,
			billingPostal varchar(20) NOT NULL,
			shippingAddress varchar(255) NULL,
			shippingCity varchar(100) NULL,
			shippingProvince varchar(100) NULL,
			shippingCountry varchar(100) NULL,
			shippingPostal varchar(20) NULL,
			PRIMARY KEY (customer_id) ) CHARSET=utf8";

	mysqli_query($conn, $sql) or die (mysqli_error());


	$sql = "CREATE TABLE IF NOT EXISTS products (
			product_id int(11) NOT NULL AUTO_INCREMENT,
			product_name varchar(100) NOT NULL,
			price DECIMAL(10,2) NOT NULL,
			PRIMARY KEY (product_id) ) CHARSET=utf8";

	mysqli_query($conn, $sql) or die (mysqli_error());

	$sql = "CREATE TABLE IF NOT EXISTS order_lookup (
			cart_id int(11) NOT NULL AUTO_INCREMENT,
			customer_id varchar(100) NOT NULL,
			product_id varchar(100) NOT NULL,
			quantity int(11) NOT NULL,
			PRIMARY KEY (cart_id) ) CHARSET=utf8";

	mysqli_query($conn, $sql) or die (mysqli_error());

	try {
		$sql = "ALTER TABLE customers ADD sameAsBilling TINYINT NULL AFTER billingPostal";
		mysqli_query($conn, $sql);
	} catch (Eception $e) {
		print_r($e);
	}
	//truncate (empty) tables before doing the following queries
	$sql = "TRUNCATE TABLE customers";
	mysqli_query($conn, $sql);
	$sql = "TRUNCATE TABLE products";
	mysqli_query($conn, $sql);
	$sql = "TRUNCATE TABLE order_lookup";
	mysqli_query($conn, $sql);
	//insert new record into customers
	$sql = "INSERT into customers (firstName, lastName, billingAddress, billingCity, billingProvince, billingCountry, billingPostal, sameAsBilling ) VALUES ('John', 'Gill', '174 South Bentinck Street', 'Sydney', 'NS', 'Canada', 'b3p 1x5', 1 ) ";
	mysqli_query($conn, $sql) or die (mysqli_error());
	echo "data inserted";
	//insert values into products and order lookup
	$sql = "INSERT into products (product_name, price) VALUES ('wodget 1', 6.99), ('widget 2', 7.99)";
	mysqli_query($conn, $sql);
	$sql = "INSERT into order_lookup (customer_id, product_id, quantity) VALUES (1,1,5), (1,2,3)";
	mysqli_query($conn, $sql);


	//loop through customer table and grab last cart id (last iteration)
	$sql = "SELECT * FROM order_lookup WHERE product_id = '2' AND customer_id = '1' ORDER BY product_id ASC";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)){
		$cart_id = $row['cart_id'];
			echo "<br />cart id is: $cart_id";
	}
	//loop through customer table and return based on G names
	$sql = "SELECT customer_id, firstName, lastName FROM customers where lastName LIKE 'G%' ORDER BY lastName ASC, firstName ASC";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)){
		$customer_id = $row['customer_id'];
		$firstName = $row['firstName'];
		$lastName = $row['lastName'];
		echo "<br />$customer_id: $firstName $lastName";
	}
	//update customers
	$sql = "UPDATE customers SET lastName='Gribble' WHERE customer_id = '1'";
	$result = mysqli_query($conn, $sql);
	//delete entry where customer id = 1
	//$sql = "DELETE from customers WHERE customer_id = '1'";
	//$result = mysqli_query($conn, $sql);


	$customer_id = 1;
	$sql = "SELECT * FROM order_lookup WHERE customer_id = $customer_id";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)){
		$cart_id = $row['cart_id'];
		$product_id = $row['product_id'];
		$customer_id_db = $row['customer_id'];
		$quantity = $row['quantity'];
		$sql = "SELECT * FROM products WHERE product_id = '$product_id'";
		$result2 = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($result2)){
			$product_id_db = $row['product_id'];
			$product_name = $row['product_name'];
			$product_price = $row['price'];
		}
		echo "<br />$cart_id: $product_id /  $product_name/ $product_price / $customer_id_db / $quantity";
	}

	$sql = "SELECT order_lookup.cart_id, order_lookup.quantity, products.product_name, products.price as product_price, customers.firstName, customers.lastName
			FROM order_lookup, customers, products
			WHERE order_lookup.customer_id = customers.customer_id AND order_lookup.product_id = products.product_id AND order_lookup.customer_id = '$customer_id'
			ORDER BY product_name ASC";
			//echo $sql;
	$result = mysqli_query($conn, $sql);
?>
<table>
	<tr>
		<td><B>Cart ID</B></td>
		<td><B>Name</B></td>
		<td><B>Product</B></td>
		<td><B>Quantity</B></td>
		<td><B>Price</B></td>
	</tr>

<?php
		while( $row = mysqli_fetch_assoc($result)) {
			$cart_id = $row['cart_id'];
			$quantity= $row['quantity'];
			$product_name = $row['product_name'];
			$product_price = $row['product_price'];
			$firstName = $row['firstName'];
			$lastName = $row['lastName'];
			echo "<tr>
					<td><b>$cart_id</b></td>
					<td><b>$firstName $lastName</b></td>
					<td><b>$product_name</b></td>
					<td><b>$quantity</b></td>
					<td><b>$product_price</b></td>
				</tr>";
		}
?>


</table>

<?php

	$sql = "SELECT order_lookup.cart_id, order_lookup.quantity, products.product_name, products.price as product_price, customers.firstName, customers.lastName
			FROM order_lookup
			INNER JOIN products on order_lookup.product_id = products.product_id
			INNER JOIN customers on order_lookup.customer_id = customers.customer_id
			WHERE order_lookup.customer_id = '$customer_id'
			ORDER BY
				product_name ASC";
	



?>
