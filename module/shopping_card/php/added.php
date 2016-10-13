<?php
session_start();
if (isset($_SESSION['logged in'])) {
	$name = $_GET['name'];
	$price = $_GET['price'];
	$description = $_GET['description'];
	if (isset($_SESSION['purchased'])) {
		if (isset($_SESSION['purchased'][$name])) {
			$_SESSION['purchased'][$name]['quantity']++;
		} else {
			$_SESSION['purchased'][$name] = array("description" => $description, "price" => $price, "quantity" => 1);
		}
	} else {
	$purchased = array($name => array("description" => $description, "price" => $price, "quantity" => 1));
	$_SESSION['purchased'] = $purchased;
	}
	print "Product added<br>";
	print '<a href = "cart.php">Show cart</a>';
	print " ";
	print '<a href = "index.php">Continue shopping</a>';
} else {
	print 'Please <a href = "login.php">Log in</a> to purchase cart';
}
?>