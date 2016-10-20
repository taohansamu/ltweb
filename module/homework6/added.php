<?php
include 'connectdatabase.php';
session_start();
if (isset($_SESSION['logged in'])) {
	$username = $_SESSION['user'];

	$name = $_GET['name'];
	$prodid = $_GET['prodid'];

	$user_id = $_SESSION['userid'];
	
	$sql = "SELECT * FROM orders WHERE user_id = '$user_id' AND product_id = '$prodid'";

	$result = mysqli_query($connect,$sql);
	if (mysqli_num_rows($result) > 0) {
		$query = "SELECT `quantity` FROM orders WHERE user_id = '$user_id' AND product_id = '$prodid'";
		$newquan = mysqli_fetch_row(mysqli_query($connect,$query))[0];
		$newquan+=1;
		$sql = "UPDATE `orders` SET quantity = '$newquan' WHERE user_id = '$user_id' AND product_id = '$prodid'";
		mysqli_query($connect,$sql);
	} else {
		$query = "INSERT INTO `orders` VALUES ('$user_id','$prodid','1')";
		mysqli_query($connect,$query);
	}

	print "Product added<br>";
	print '<a href = "cart.php">Show cart</a>';
	print " ";
	print '<a href = "index.php">Continue shopping</a>';
} else {
	print 'Please <a href = "login.php">Log in</a> to purchase cart';
}
mysqli_close($connect);
?>