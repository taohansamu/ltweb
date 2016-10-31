<?php  
	require("Page.php");
	$webPage = new Page('Web Page Example',date('Y'),'Nguyen Dinh Tao');
	$webPage->addContent("<p align = \"center\">It's an example of page class</p>");
	echo $webPage->get();
?>
