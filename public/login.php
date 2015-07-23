<?php
session_start();
require '../functions.php';


if(!empty($_POST['name']) && !empty($_POST['password'])) {
	if(escape(strtolower($_POST['name'])) == "guest" && (strtolower($_POST['password']) == "password")) {
		$_SESSION['LOGGED_IN_USER'] = true;	
		$_SESSION['name'] = 'guest';
			header('location: authorized.php'); // always add an exit(); after a header(Location: ....);
			exit();
		} else {
			echo "Login Failed";
		}
} else {
	echo "Please Enter Name and Password";
}


if(isset($_SESSION['LOGGED_IN_USER'])) {
	header('location: authorized.php');
	exit();
}



?>
	
<!DOCTYPE html>
<html>
<head>
	<title>POST Example</title>
	<style>
	body {

		font-family: Verdana;
		font-size: 1.5em;
		background-color: #FAF0F5;
	}

	p {
		font-weight: bolder;
	}

	.container {
		margin: auto;
		border: double black 5px;
		padding: 20px;
	}
	</style>
</head>
<body>
	<div class="container">
		
		<p>Login (enter below):</p>
		<form method="POST">
			<label>Name</label>
			<input type="text" name="name" value="" placeholder="name"><br>
			<label>Password</label>
			<input type="password" name="password" value="" placeholder="password"><br>
			<input type="submit">
		</form>


	</div>
</body>
</html>