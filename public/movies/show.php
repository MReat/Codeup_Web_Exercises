<?php 
session_start();

if(empty($_POST['title']) || empty($_POST['description'])){
	header('location: /movies/index.php');
	exit();
} else {
	$title = ($_POST['title']);
	$description = ($_POST['description']);
	$movie = ['title' => $title, 'description' => $description];
	$_SESSION['movies'][] = $movie;
}

var_dump($_SESSION);

?>

<html>
<head>
	<title>Movie Titles and Descriptions</title>
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
		<h1>Movie Information</h1>
		<a href="/movies/index.php">Return to Movie Index Page</a>
		
		<dl>
		<? foreach($_SESSION['movies'] as $movie): ?>
			<dt><?= $movie['title']; ?></dt>
			<dd><?= $movie['description']; ?></dd>
		<? endforeach ?>
		</dl>

	</div>
</body>
</html>