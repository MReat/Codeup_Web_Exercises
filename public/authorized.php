<?php
session_start();

if(isset($_SESSION['LOGGED_IN_USER'])) {
	$username = $_SESSION['name'];
} else {
	header('location: login.php');
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