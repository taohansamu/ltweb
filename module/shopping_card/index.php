<?php
include 'php/login.php';
if(isset($_SESSION['username']))header("location:php/home.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form in PHP with Session</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
    <h1>Login</h1>
    <div id="login">
        <form action="" method="post">
            <label>UserName :</label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login ">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</div>
</body>
</html>
