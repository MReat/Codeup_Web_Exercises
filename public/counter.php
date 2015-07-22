<?php

var_dump($_GET);

function pageController() 
{
	$data = [];
	if(isset($_GET['counter'])) {
		$counter = $_GET['counter'];
		if($_GET['direction'] == 'up') {
			$counter++;
		} elseif ($_GET['direction'] == 'down') {
			$counter--;
		}
	} else {
		$counter = 0;
	}
	$data['counter'] = $counter;
	return $data;
}

extract(pageController());

?>
<!doctype html>
<html>
<head>
	<title>Counter Exercise</title>
</head>
<body>

	<h2><?= $counter ?></h2>
	<a href="?direction=up&counter=<?= $counter ?>">Up</a>
	<a href="?direction=down&counter=<?= $counter ?>">Down</a>


	<h2></h2>
</body>
</html>