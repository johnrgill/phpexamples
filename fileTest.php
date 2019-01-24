<?php

	$txt = "<?xml version=\"1.0\" ?>\n
			<catalog>\n
				<book id=\"bk101\">\n
					<author>author 01</author>\n
					<title>title 01</title>\n
					<genre>sciFi</genre>\n
					<price>3.99</price>\n
					<publishdate>2018</publishdate>\n
					<description>blah blah blah</description>\n
				</book>\n
				<book id=\"bk102\">\n
					<author>author 02</author>\n
					<title>title 02</title>\n
					<genre>Horror</genre>\n
					<price>1.99</price>\n
					<publishdate>2011</publishdate>\n
					<description>scary blah blah</description>\n
				</book>\n
				<book id=\"bk103\">\n
					<author>author 03</author>\n
					<title>title 03</title>\n
					<genre>romance</genre>\n
					<price>4.99</price>\n
					<publishdate>2008</publishdate>\n
					<description>blah love blah</description>\n
				</book>\n
</catalog>";
$myFile = fopen('myfile.xml', 'w');
fwrite($myFile, $txt);
fclose($myFile);
?>
<!-- <?xml version="1.0" ?>
<catalog>
	<book id="bk101">
		<author>author 01</author>
		<title>title 01</title>
		<genre>sciFi</genre>
		<price>3.99</price>
		<publishdate>2018</publishdate>
		<description>blah blah blah</description>
	</book>
	<book id="bk102">
		<author>author 02</author>
		<title>title 02</title>
		<genre>Horror</genre>
		<price>1.99</price>
		<publishdate>2011</publishdate>
		<description>scary blah blah</description>
	</book>
	<book id="bk103">
		<author>author 03</author>
		<title>title 03</title>
		<genre>romance</genre>
		<price>4.99</price>
		<publishdate>2008</publishdate>
		<description>blah love blah</description>
	</book>
</catalog> -->