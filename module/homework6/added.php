<?php
include 'connectdatabase.php';
session_start();
if (isset($_SESSION['logged in'])) {
	$username = $_SESSION['user'];

	$name = $_GET['name'];
	$prodid = $_GET['prodid'];

	$user_id = $_SESSION['userid'];
	
	$sql = "SELECT * FROM orders WHERE user_id = '$user_id' AND product_id = '$prodid'";

	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$query = "SELECT `quantity` FROM orders WHERE user_id = '$user_id' AND product_id = '$prodid'";
		$newquan = mysql_fetch_row(mysql_query($query))[0];
		$newquan+=1;
		$sql = "UPDATE `orders` SET quantity = '$newquan' WHERE user_id = '$user_id' AND product_id = '$prodid'";
		mysql_query($sql);
	} else {
		$query = "INSERT INTO `orders` VALUES ('$user_id','$prodid','1')";
		mysql_query($query);
	}

	print "Product added<br>";
	print '<a href = "cart.php">Show cart</a>';
	print " ";
	print '<a href = "index.php">Continue shopping</a>';
} else {
	print 'Please <a href = "login.php">Log in</a> to purchase cart';
}
mysql_close();
?>