<?php
session_start();
if (isset($_GET['name'])) {
	$name = $_GET['name'];
	unset($_SESSION['purchased'][$name]);
}
?>
<p><font color="red"><h2>Shopping Cart</h2></font></p>
<table>
<tr bgcolor="black">
<th width="100"><font color="white">Name</font></th>
<th width="100"><font color="white">Price</font></th>
<th width="100"><font color="white">Qty</font></th>
<th width="100" colspan = 2></th>
</tr>
<?php
$purchased = $_SESSION['purchased'];
$i = 0;
foreach ($purchased as $name => $info) {
	$qty = $info['quantity'];
	print '<tr bgcolor="#A9A9A9">';
	print '<td width="100"><font color="black">';
	print "$name</font></td>";
	print '<td width="100"><center><font color="black">';
	print $info['price']*$info['quantity'] + "</font></center></td>";
	print '<td width="100">';
	print "$qty</td>";
	print "<td><a href = \"update.php?name=$name\">Update</a></td>";
	print "<td><a href = \"cart.php?name=$name\">Delete</a></td></tr>";
}
?>
</table><br>
<a href="index.php">Continue Shopping</a>
<a href="checkout.php">Proceed to Checkout</a>