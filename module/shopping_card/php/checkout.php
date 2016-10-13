<?php
session_start();
$purchased = $_SESSION['purchased'];
if (empty($purchased)) {
	print "You haven't purchased anything. Go buy something.<br>";
} else {
	print "Thank you for your order.";
	print "<ul>";
	foreach ($purchased as $name => $info) {
		$description = $info['description'];
		print "<li>$description</li>";
		unset($_SESSION['purchased'][$name]);
	}
	print "</ul>";
}
?>
<a href="index.php">Back to Homepage</a>