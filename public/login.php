<?php
// require_once '../functions.php';
// require_once '../Input.php';
// require_once '../Auth.php';
// session_start();

// if((!Input::has('username')) && (!Input::has('password'))) {
// 	echo "Please Enter Name and Password";
// }

// if(Input::has('username') && Input::has('password')){
// 	$username = escape(Input::get('username'));
// 	$password = escape(Input::get('password'));
// 	Auth::attempt($username, $password);
// } 


// if(Auth::check()) {
// 	header('location: /authorized.php'); // always add an exit(); after a header(Location: ....);
// 	exit();
// }

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
			<input type="text" name="username" placeholder="username"><br>
			<label>Password</label>
			<input type="password" name="password" placeholder="password"><br>
			<input type="submit">
		</form>


	</div>
</body>
</html>