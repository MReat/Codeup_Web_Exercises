<?php 
session_start();
session_destroy();

$_SESSION['LOGGED_IN_USER'] = false;
header('location: login.php');
exit();

?>