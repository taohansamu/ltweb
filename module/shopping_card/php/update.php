<?php
session_start();
$name = $_GET['name'];
if (isset($_POST['update'])) {
	$qty = $_POST['qty'];
	if (is_numeric($qty) && $qty >= 0) {
		if ($qty == 0) {
			unset($_SESSION['purchased'][$name]);
		} else {
			$_SESSION['purchased'][$name]['quantity'] = $qty;
		}
		print "Update Successfully. You will be redirect to Shop Cart after 2 seconds.";
		header("refresh:2;url=cart.php");
	} else {
		print "Failed to update. Please check input Quantity.";
	}
}
$product = $_SESSION['purchased'][$name];
$qty = $product['quantity'];
print "<h2>You purchased $name product. Old Quantity: $qty</h2><br>";
print "<font color =\"red\">Update the new quantity value: </font>";
?>
<form method="POST">
<input type="text" name="qty" value=<?php print $qty; ?>><br>
<input type="submit" name="update" value="Update">

