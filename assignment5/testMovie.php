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
//error_reporting(0);
include ('Movie.php');
$movieArray = array();
$xml = simplexml_load_file("myfile.xml");
if (file_exists("myfile.xml")) {
		foreach($xml->children() as $movie) {
			$id = (int)$movie->id;
			$picture = (string)$movie->picture;
			$title = (string)$movie->title;
			$year = (string)$movie->year;
			$director = (string)$movie->director;
			$actor = (string)$movie->actor;
			$genre = (string)$movie->genre;
			$imdb = (string)$movie->imdb;

			$theMovie = new Movie($id, $picture, $title, $year, $director, $actor, $genre, $imdb);

		array_push($movieArray, $theMovie);



		}

	}
	
	echo "<table>";
	echo "<tr>";
	
	for($i = 1; $i < 10; $i++) {

			echo "<td><img src='".$movieArray[$i]->getPicture()."'>";
			echo "<h4>".$movieArray[$i]->getTitle()."</h4>";
			echo "<h4>".$movieArray[$i]->getYear()."</h4>";
			echo "<strong>Director: </strong>".$movieArray[$i]->getDirector()."<br/>";
			echo "<strong>Main Actor/Actress: </strong>".$movieArray[$i]->getActor()."<br/>";
			echo "<strong>Genre: </strong>".$movieArray[$i]->getGenre()."<br/>";
			echo "</td>";
			if ($i % 3 == 0) {
				echo "</tr><tr>";
			}
		}
	echo "</tr>";
	echo "</table>";
 ?>