<?php
session_start();
session_destroy();
print 'You have been logged out. <br><a href="index.php">Go to Homepage</a>';
?>
