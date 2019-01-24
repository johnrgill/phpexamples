<?php

if (file_exists("./myfile.xml")) {
	$myFile = fopen("./myfile.xml", 'r') or die("no access");
	$xml_text = fread($myFile, filesize("./myfile.xml"));
	fclose($myFile);
	echo($xml_text);
} else {
	echo "File does not exist";
}

$filename = "./myfile.xml";
if (file_exists($filename)) {
	chmod($filename, 0644);
	echo"File permission changed";
} else {
	echo "File does not exist";
}

if (file_exists($filename)) {
	unlink($filename);
	echo "file removed";
}
	else {
		echo "blah";
	}
?>