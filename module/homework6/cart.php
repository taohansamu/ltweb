<?php
include 'connectdatabase.php';
session_start();
if (isset($_GET['prodid'])) {
	$prodid = $_GET['prodid'];
	$userid = $_SESSION['userid'];
	$sql = "DELETE FROM orders WHERE user_id = '$userid' AND product_id = '$prodid'";
	mysql_query($sql);
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
$user_id = $_SESSION['userid'];
$sql = "SELECT `product_name`,`price`,`quantity`, orders.product_id FROM orders INNER JOIN product WHERE orders.product_id = product.product_id";
$result = mysql_query($sql);

while ($row = mysql_fetch_row($result)) {
	print '<tr bgcolor="#A9A9A9">';
	print '<td width="100"><font color="black">';
	print "$row[0]</font></td>";
	print '<td width="100"><center><font color="black">';
	print $row[1]*$row[2] + "</font></center></td>";
	print '<td width="100">';
	print "$row[2]</td>";
	print "<td><a href = \"update.php?prodid=$row[3]\">Update</a></td>";
	print "<td><a href = \"cart.php?prodid=$row[3]\">Delete</a></td></tr>";
}
mysql_close();
?>
</table><br>
<a href="index.php">Continue Shopping</a>
<a href="checkout.php">Proceed to Checkout</a>