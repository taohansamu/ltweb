<?php
include 'connectdatabase.php';
session_start();
if (!empty($_SESSION['logged in'])) {
	$user = $_SESSION['user'];
	print "Welcome ";
	print "<b><i>$user</i></b> to BKShop";
	?>
	<br>
	<a href="logout.php">Log out</a> | 
	<a href="cart.php">Shooping Cart</a>
	<?php
}
else {
	print '<p>Welcome to BKShop</p>';
	print '<a href="login.php">Log in</a>';
}
$sql = 'SELECT `product_name`, `product_id`, `product_description` FROM product';
$result = mysql_query($sql,$connect);
?>
<p><font color ="red"><h2>Available Product</h2></font></p>
<table>
<tr bgcolor="black">
<th width="100"><font color="white">Name</font></th>
<th width="250"><font color="white">Description</font></th>
<th width="100"></th>
</tr>
<?php
$i = 0;
while ($row = mysql_fetch_row($result)) {
		if ($i%2 == 0) {
			print '<tr bgcolor="#A9A9A9">';
			print '<td width="100"><font color="black">';
			print "$row[0]</font></td>";
			print '<td width="250"><font color="black">';
			print "$row[2]</font></td>";
			print '<td width="100">';
			print "<a href=\"added.php?name=$row[0]&prodid=$row[1]\"><center>Add to cart</center></a></tr>";
		} else {
			print '<tr bgcolor="#DCDCDC">';
			print '<td width="100"><font color="black">';
			print "$row[0]</font></td>";
			print '<td width="250"><font color="black">';
			print "$row[2]</font></td>";
			print '<td width="100">';
			print "<a href=\"added.php?name=$row[0]&prodid=$row[1]\"><center>Add to cart</center></a></tr>";
		}
		$i++;
}
mysql_close();
?>