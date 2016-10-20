<?php
include "connectdatabase.php";
session_start();
$result = mysql_query("SELECT `product_description`,`price`,`quantity`, orders.product_id FROM orders INNER JOIN product WHERE orders.product_id = product.product_id");
if (mysql_num_rows($result) == 0) {
	print "You haven't purchased anything. Go buy something.<br>";
} else {
	print "Thank you for your order.";
	print "<ul>";
	while ($row = mysql_fetch_row($result)) {
		print "<li>$row[0]</li>";
	}
	$user_id = $_SESSION['userid'];
	mysql_query("DELETE FROM orders WHERE user_id = '$user_id'");
	print "</ul>";
}
mysql_close();
?>
<a href="index.php">Back to Homepage</a>