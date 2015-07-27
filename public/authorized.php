<?php
// require_once '../Input.php';
session_start();
require_once '../Auth.php';

if(Auth::check()) {
	$username = $_SESSION['username'];
} else {
	header("Location: login.php");
	exit();
}

?>

<html>
<head>
	<title>Authorized</title>
</head>
<body>
	<h1>Authorized</h1>
	<h2>Welcome: <?= $username ?></h2>
	<a href="logout.php">logout</a>

</body>
</html>