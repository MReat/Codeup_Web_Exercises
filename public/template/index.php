<?php  
$heading = "Content for the Header Here";
$footing = "Content for the Footer Here";
$navbar = "Main  Page2  Page3";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	<? include 'navbar.php'; ?>
	<? include 'header.php'; ?>

	<main>
		<p> 

			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		
		</p>

	</main>

	<? include 'footer.php'; ?>

</body>
</html>