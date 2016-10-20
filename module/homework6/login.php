<?php
include 'connectdatabase.php';
function checkLogin($userinfo, $username, $password) {
	foreach ($userinfo as $user => $pass) {
		if ($user == $username) {
			if ($pass == $password) {
				return true;
			} else {
				return false;
			}
		}
	}
	return false;
}

session_start();
$sql = 'SELECT `username`,`password` FROM user';
$result = mysql_query($sql,$connect);
$userinfo = array();
while ($row = mysql_fetch_row($result)) {
	$userinfo[$row[0]] = $row[1];
}

if (!empty($_POST) && !empty($user = $_POST['username']) && !empty($password = $_POST['password'])) {
	if (checkLogin($userinfo, $user, $password)) {
		$_SESSION['logged in'] = true;
		$_SESSION['user'] = $user;
		$sql = "SELECT `user_id` FROM user WHERE username = '$user'";	
		$user_id = mysql_fetch_row(mysql_query($sql))[0];
		$_SESSION['userid'] = $user_id;
		header('Location: index.php');
	} else {
		print "Wrong Username or Password."
		?>
		<form method="POST">
		<table>
		<tr>
		<td>Username: </td><td><input type="text" name="username"></td>
		</tr>
		<tr>
		<td>Password: </td><td><input type="password" name="password"></td>
		</tr>
		</table><br>
		<input type="submit" value="Log in">
		</form>
		<?php
	}
	mysql_close();
} 
else {
	?>
	<form method="POST">
	<table>
	<tr>
	<td>Username: </td><td><input type="text" name="username"></td>
	</tr>
	<tr>
	<td>Password: </td><td><input type="password" name="password"></td>
	</tr>
	</table><br>
	<input type="submit" value="Log in">
	</form>
	<?php
	mysql_close();
}
?>