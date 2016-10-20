<?php
/*$server = 'mysql.hostinger.vn';
$user = 'u685691000_root';
$pass = 'taohansamu995';
$db='u685691000_spc';
$connect = mysql_connect($server,$user,$pass,$db);
if (!$connect) {
	die("Cannot connect to Database Server");
} */
$server = 'localhost';
$user = 'root';
$pass = '';
$db='shoppingcart';
$connect = mysqli_connect($server,$user,$pass,$db);
if (!$connect) {
	die("Cannot connect to Database Server");
} 
?>