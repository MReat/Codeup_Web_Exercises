<?php

var_dump($_GET);

// practice using a function and passing to the pageController function

function counterCalculate () {

	if(isset($_GET['direction'])) {

		$counter = $_GET['counter'];
		if($_GET['direction'] == 'up') {
			$counter ++;
		} elseif ($_GET['direction'] == 'down')  {
			$counter --;
		}
	} else {
		$counter = 0;
	}
	return $counter;

}

function pageController() 
{
	$data = [];
	$data['counter'] = counterCalculate();
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