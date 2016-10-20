<?php
include "connectdatabase.php";
session_start();
$result = mysqli_query($connect,"SELECT `product_description`,`price`,`quantity`, orders.product_id FROM orders INNER JOIN product WHERE orders.product_id = product.product_id");
if (mysqli_num_rows($result) == 0) {
	print "You haven't purchased anything. Go buy something.<br>";
} else {
	print "Thank you for your order.";
	print "<ul>";
	while ($row = mysqli_fetch_row($result)) {
		print "<li>$row[0]</li>";
	}
	$user_id = $_SESSION['userid'];
	mysqli_query($connect,"DELETE FROM orders WHERE user_id = '$user_id'");
	print "</ul>";
}
mysqli_close($connect);
?>
<a href="index.php">Back to Homepage</a>