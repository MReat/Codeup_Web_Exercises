<?php 
require_once '../Input.php';
require_once '../Auth.php';
session_start();
Auth::logout();

header('location: auth.login.php');
exit();
	
?>