<?php 
$txt = "<?xml version=\"1.0\" ?>\n
			<catalog>\n
				<movie id=\"mv1\">\n
					<picture><a href=\"https://www.imdb.com/title/tt0107290/mediaviewer/rm3913805824\" /></picture>\n
					<title>Jurassic Park</title>\n
					<director>Steven Spielberg</director>\n
					<actor>Sam Neill</actor>\n
					<imdb><a href=\"https://www.imdb.com/title/tt0107290/\" /></imdb>\n
					<year>1993</year>\n
					<genre>Action/Adventure</genre>\n
				</movie>
				<movie id=\"m2\">\n
					<picture><a href=\"https://www.imdb.com/title/tt0120737/mediaviewer/rm3592958976\" /></picture>\n
					<title>Lord of the Rings: Fellowship of the Ring</title>\n
					<director>Peter Jackson</director>\n
					<actor>Elijah Wood</actor>\n
					<imdb><a href=\"https://www.imdb.com/title/tt0120737/?ref_=nv_sr_1\" /></imdb>\n
					<year>2001</year>\n
					<genre>Fantasy/Adventure</genre>\n
				</movie>
				<movie id=\"m3\">\n
					<picture><a href=\"https://www.imdb.com/title/tt0208092/mediaviewer/rm1248859904\" /></picture>\n
					<title>Snatch</title>\n
					<director>Guy Ritchie</director>\n
					<actor> Jason Statham</actor>\n
					<imdb><a href=\"https://www.imdb.com/title/tt0208092/?ref_=nv_sr_1\" /></imdb>\n
					<year>2000</year>\n
					<genre>Crime/Comedy</genre>\n
				</movie>
				<movie id=\"m4\">\n
					<picture><a href=\"https://www.imdb.com/title/tt0117998/mediaviewer/rm2479295232\" /></picture>\n
					<title>Twister</title>\n
					<director>Jan de Bont</director>\n
					<actor>Helen Hunt</actor>\n
					<imdb><a href=\"https://www.imdb.com/title/tt0117998/\" /></imdb>\n
					<year>1996</year>\n
					<genre>Action/Adventure</genre>\n
				</movie>
				<movie id=\"m5\">\n
					<picture><a href=\"https://www.imdb.com/title/tt0120689/mediaviewer/rm946247936\" /></picture>\n
					<title>The Green Mile</title>\n
					<director>Frank Darabont</director>\n
					<actor>Tom Hanks</actor>\n
					<imdb><a href=\"https://www.imdb.com/title/tt0120689/?ref_=nv_sr_1\" /></imdb>\n
					<year>1999</year>\n
					<genre>Crime/Drama</genre>\n
				</movie>
				<movie id=\"m6\">\n
					<picture><a href=\"https://www.imdb.com/title/tt0111161/mediaviewer/rm10105600\" /></picture>\n
					<title>The Shawshank Redemption</title>\n
					<director>Frank Darabont</director>\n
					<actor>Morgan Freeman</actor>\n
					<imdb><a href=\"https://www.imdb.com/title/tt0111161/?ref_=nv_sr_1\" /></imdb>\n
					<year>1994</year>\n
					<genre>Drama</genre>\n
				</movie>
				<movie id=\"m7\">\n
					<picture><a href=\"https://www.imdb.com/title/tt0190590/mediaviewer/rm1839878400\" /></picture>\n
					<title>O Brother Where Art Thou</title>\n
					<director>Coen Brothers</director>\n
					<actor>George Clooney</actor>\n
					<imdb><a href=\"https://www.imdb.com/title/tt0190590/?ref_=nv_sr_1\" /></imdb>\n
					<year>2000</year>\n
					<genre>Adenture/Comedy</genre>\n
				</movie>
				<movie id=\"m8\">\n
					<picture><a href=\"https://www.imdb.com/title/tt0379786/mediaviewer/rm2756644864\" /></picture>\n
					<title>Serenity</title>\n
					<director>Joss Whedon</director>\n
					<actor>Nathan Fillion</actor>\n
					<imdb><a href=\"https://www.imdb.com/title/tt0379786/?ref_=tt_rec_tt\" /></imdb>\n
					<year>2005</year>\n
					<genre>Action/SciFi</genre>\n
				</movie>
				<movie id=\"m9\">\n
					<picture><a href=\"https://www.imdb.com/title/tt0110912/mediaviewer/rm1959546112\" /></picture>\n
					<title>Pulp Fiction</title>\n
					<director>Quientin Tarantino</director>\n
					<actor>Samuel L Jackson</actor>\n
					<imdb><a href=\"https://www.imdb.com/title/tt0110912/?ref_=nv_sr_1\" /></imdb>\n
					<year>1994</year>\n
					<genre>Crime/Drama</genre>\n
				</movie>
				<movie id=\"m10\">\n
					<picture><a href=\"https://www.imdb.com/title/tt0118715/mediaviewer/rm318364928\" /></picture>\n
					<title>The Big Lebowski</title>\n
					<director>Coen Brothers</director>\n
					<actor>Jeff Bridges</actor>\n
					<imdb><a href=\"https://www.imdb.com/title/tt0118715/?ref_=nv_sr_3\" /></imdb>\n
					<year>1998</year>\n
					<genre>Comedy</genre>\n
				</movie>
			</catalog>";


	$myFile = fopen('myfile.xml', 'w');
	fwrite($myFile, $txt);
	fclose($myFile);



 ?>