<?php
$server = 'mysql.hostinger.vn';
$user = 'u685691000_root';
$pass = 'taohansamu995';

$connect = mysql_connect($server,$user,$pass);
if (!$connect) {
	die("Cannot connect to Database Server");
} else {
	mysql_select_db('u685691000_spc');
}
?>