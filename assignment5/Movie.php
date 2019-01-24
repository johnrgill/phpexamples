<?php 
	class Movie {
		protected $id;
		protected $picture;
		protected $title;
		protected $year;
		protected $director;
		protected $actor;
		protected $genre;
		protected $imdb;
		function getID() {
			return $this->id;
		}
		function getPicture() {
			return $this->picture;
		}
		function getYear() {
			return $this->year;
		}
		function getTitle() {
			return $this->title;
		}
		function getDirector() {
			return $this->director;
		}
		function getActor() {
			return $this->actor;
		}
		function getGenre() {
			return $this->genre;
		}
		function getImdb() {
			return $this->imdb;
		}
		function setID($temp) {
			$this->id = temp;
		}
		function setPicture($temp) {
			$this->picture = $temp;
		}
		function setTitle($temp) {
			$this->title = $temp;
		}
		function setYear($temp) {
			$this->year = $temp;
		}
		function setDirector($temp) {
			$this->director = $temp;
		}
		function setActor($temp) {
			$this->actor = $temp;
		}
		function setGenre($temp) {
			$this->genre = $temp;
		}
		function setImdb($temp) {
			$this->imdb = $temp;
		}
		function __construct() {
			$parameter = func_get_args();
			if (count($parameter) == 8) {
				$this->id = $parameter[0];
				$this->picture = $parameter[1];
				$this->title = $parameter[2];
				$this->year = $parameter[3];
				$this->director = $parameter[4];
				$this->actor = $parameter[5];
				$this->genre = $parameter[6];
				$this->imdb = $parameter[7];

			} else {
				$this->id = 0;
				$this->picture = "";
				$this->title = "";
				$this->year = "";
				$this->director = "";
				$this->actor = "";
				$this->genre = "";
				$this->imdb = "";

			}
		}
		function __destruct() {

		}
		function display() {
			echo "id: ".$this->id."<br/>";
			echo "picture: ".$this->picture."<br/>";
			echo "title: ".$this->title."<br/>";
			echo "year: ".$this->year."<br/>";
			echo "director: ".$this->director."<br/>";
			echo "actor: ".$this->actor."<br/>";
			echo "genre: ".$this->genre."<br/>";
			echo "imdb: ".$this->imdb."<br/>";
		}
	}

	

 ?>




