<?php

if(!empty($_POST['name']) && !empty($_POST['password'])) {
	if($_POST['name'] == "guest" && ($_POST['password'] == "password")) {
		header('location: authorized.php');
	} else {
		echo "Login Failed";
	}
} else {
	echo "Please Enter Username/Password";
}



?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
	<h1>Login Screen</h1>
	    <form method="POST">
	        <label>Name</label>
	        <input type="text" name="name" value=""><br>
	        <label>Password</label>
	        <input type="password" name="password" value=""><br>
	        <input type="submit">
	    </form>
</body>
</html>