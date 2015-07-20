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
				<? foreach ($favorite_things as $key => $thing): ?>
					<? if($key % 2 == 0): ?>
						<li id="even"> <?= $thing; ?></li>
					<? else: ?>
						<li><?= $thing; ?></li>
					<? endif; ?>
					<? endforeach; ?>
			</ol>
		</div>
</body>
</html>

