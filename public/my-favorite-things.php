<?php 

$favorite_things = ['Carmen', 'Gaming', 'Eating', 'Sleeping', 'Insert-Blanking'];


?>
<html>
<head>
	<title>Favorite Things List</title>
	<link rel="stylesheet" type="text/css" href="/css/custom_withPHP.css">
</head>
<body>
	<h1>My Favorite Things</h1>
	<div class="container">
		<ol>
			<?php foreach($favorite_things as $key => $thing){
				if($key % 2 == 0) { ?>
				<li id="even"> <?php echo $thing; ?></li>
				<?php } else { ?>
				<li><?php echo $thing; ?></li>
				<?php } 
			} ?>
		</ol>
	</div>
</body>
</html>

