<?php
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
$userinfo = array("admin"=>"admin", "guest"=>"guest");

if (!empty($_POST) && !empty($user = $_POST['username']) && !empty($password = $_POST['password'])) {
	if (checkLogin($userinfo, $user, $password)) {
		$_SESSION['logged in'] = true;
		$_SESSION['user'] = $user;
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
}
?>