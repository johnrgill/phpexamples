<style type="text/css">
	img {
		max-height: 300px;
		max-height: 300px;
	}
	table, td{
		border: 3px black solid;
		border-collapse: collapse;
		text-align: center;
	}

</style>
<?php 
//i starts at 0 and when it hits 3 it echos the end of the current row and the beginning of a new one
	$i = 0;
	if (file_exists("myfile.xml")) {
		$xml = simplexml_load_file("myfile.xml");
		echo "<table>";
		echo "<tr>";
		foreach($xml->movie as $movie) {

			echo "<td><img src='".$movie->picture."'>";
			echo "<h4>".$movie->title."</h4>";
			echo "<h4>".$movie->year."</h4>";
			echo "<strong>Director: </strong>".$movie->director."<br/>";
			echo "<strong>Main Actor/Actress: </strong>".$movie->actor."<br/>";
			echo "<strong>Genre: </strong>".$movie->genre."<br/>";
			echo "</td>";
			$i ++;
			if ($i%3 ==0) {
				echo "</tr><tr>";
			}
		}
	}
	echo "</tr>";
	echo "</table>";
 ?>

