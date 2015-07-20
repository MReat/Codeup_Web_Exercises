<?php 
	$adjectives = ['angry', 'rancid', 'awkward', 'homogenous', 'frantic', 'splendid', 'organic', 'gluten-free', 'passionate', 'rocking'];
	$nouns = ['unicorn', 'marshmallow', 'aardvark', 'cucumber', 'vampire', 'blimp', 'pony', 'rainbow', 'hobbit', 'dam'];
	$random_choice = mt_rand(0,count($adjectives) - 1);	
	$random_choice2 = mt_rand(0,count($nouns) - 1);	
 ?>
 <html>
 <head>
 	<title>Random Server Name Generator</title>
 	<link rel="stylesheet" type="text/css" href="/css/custom_withPHP.css">
 </head>
 <body>
 	<div class="container">
	 	<h1 align="center" id="server"><?= (ucfirst($adjectives[$random_choice]) . "-" . ucfirst($nouns[$random_choice2])); ?></h1>
 	</div>
 </body>
 </html>