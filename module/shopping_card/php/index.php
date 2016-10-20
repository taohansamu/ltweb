
<?php
session_start();
include ""
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
$cart = array("Apple"=>"Iphone", "Sony"=>"Sony Xperia", "HTC"=>"HTC 10", "Oppo"=>"Oppo F1 S", "SamSung"=>"SamSung Galaxy S7 Edge");
$price = [100,200,300,400,500];
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
foreach ($cart as $name => $description) {
	if ($i%2 == 0) {
		print '<tr bgcolor="#A9A9A9">';
		print '<td width="100"><font color="black">';
		print "$name</font></td>";
		print '<td width="250"><font color="black">';
		print "$description</font></td>";
		print '<td width="100">';
		print "<a href=\"added.php?name=$name&description=$description&price=$price[$i]\"><center>Add to cart</center></a></tr>";
	} else {
		print '<tr bgcolor="#DCDCDC">';
		print '<td width="100"><font color="black">';
		print "$name</font></td>";
		print '<td width="250"><font color="black">';
		print "$description</font></td>";
		print '<td width="100">';
		print "<a href=\"added.php?name=$name&description=$description&price=$price[$i]\"><center>Add to cart</center></a></tr>";
	}
	$i++;
}