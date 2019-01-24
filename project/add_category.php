<?php 
//display the form in this file to add a category
 ?>
<ul><li><a href="index.html">home</a></li>
	<li><a href="add_category.php">add category</a></li>
	<li><a href="view_categories.php">view categories</a></li>
	<li><a href="add_item.php">add item</a></li>
	<li><a href="view_items.php">view items</a></li>
</ul>
 <form action="check_add_category.php" method="POST">
 	category: <input type="text" name="category" value="" placeholder="enter a category" />
 	<input type="submit" name="submit" 
	value="Submit" />
</form>
	<br/>