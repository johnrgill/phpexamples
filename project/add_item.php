<?php 
include 'dbinfo.php';
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);


 ?>
 <ul><li><a href="index.html">home</a></li>
	<li><a href="add_category.php">add category</a></li>
	<li><a href="view_categories.php">view categories</a></li>
	<li><a href="add_item.php">add item</a></li>
	<li><a href="view_items.php">view items</a></li>
</ul>
 <form action="check_add_item.php" method="POST" enctype="multipart/form-data">
 	category: <select name="categories"><?php 
 		while ($row = mysqli_fetch_assoc($result)) {
 			echo "<option value='". $row['cat_name'] . "'/>" . $row['cat_name'] . "</option>";
 		}
 	?></select><br/>
 	title: <input type="text" name="title" value="" placeholder="enter a title" /><br/>
 	description: <input type="text" name="description" value="" placeholder="enter a description" /><br/>
 	price: <input type="text" name="price" value="" placeholder="enter a price" /><br/>
 	quantity: <input type="text" name="quantity" value="" placeholder="enter a quantity" /><br/>
 	sku: <input type="text" name="sku" value="" placeholder="enter a sku" /><br/>
 	picture: <input type="file" name = "picture">
 	<input type="submit" name="submit" 
	value="Submit" />
</form>
	<br/>

