<?php 

require_once '../parks_config.php';
require_once '../db_connect.php';


$limit = 4;
$page = isset($_GET['page']) ? $_GET['page'] : 0;
$offset = $page * 4;

$parks = $dbc->prepare("SELECT * FROM national_parks LIMIT :limit OFFSET :offset");

//bind
$parks->bindValue(':limit', $limit, PDO::PARAM_INT);
$parks->bindValue(':offset', $offset, PDO::PARAM_INT);


//execute
$parks->execute();
$parks = $parks->fetchAll(PDO::FETCH_ASSOC);


$count = $dbc->query('SELECT COUNT(*) FROM national_parks')->fetchColumn();

$numberOfPages = floor($count / $limit);

?>

<html>
<head>
	<title>National Parks (PHP)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>

	<h1>National Parks</h1>
	<div class="container">
		<table class="table-striped container">
			<tr style="font-size; 18px; font-weight: bolder">
				<td>Name</td>
				<td>Location</td>
				<td>Date Established</td>
				<td>Area (in acres)</td>
				<td>Description</td>
			</tr>

			<? foreach ($parks as $park): ?>
			<tr>
				<td><?= $park['name']; ?></td>
				<td><?= $park['location']; ?></td>
				<td><?= date_format(date_create($park['date_established']),'l, F j, Y'); ?></td>
				<td><?= number_format($park['area_in_acres'], 2); ?></td>
				<td><?= $park['description']; ?></td>
			</tr>	
		<? endforeach; ?>
	</table>

</div>
<ul class="pager">
	<? // pagination ?>

	<? if ($page != 0) :?>
	<li><a href="?page=<?= ($page - 1) ?>">PREVIOUS</a></li>
<? endif ?>

<? if ($page < $numberOfPages) :?>
<li><a href="?page=<?= ($page + 1) ?>">NEXT</a></li>
<? endif ?>

</ul>



</body>
</html>
