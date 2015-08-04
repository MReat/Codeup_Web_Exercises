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

	<form role="form" method="POST" enctype="multipart/form-data" action="">
	  <h2>Add Park</h2>
		<div class="form-group">

			<label for="name">Name:</label>
			<input class="form-control" id="name" name="name" type="text" placeholder="NAME">

			<label for="location">Location</label>
			<input class="form-control" id="location" name="location" type="text" placeholder="LOCATION">

			<label for="date_established">Date Established</label>
			<input class="form-control" id="date_established" name="date_established" type="date_established" placeholder="DATE ESTABLISHED">

			<label for="area_in_acres">Area (in acres)</label>
			<input class="form-control" id="area_in_acres" name="area_in_acres" type="text" placeholder="AREA">

			<label for="description">Description</label>
			<input class="form-control" id="description" name="description" type="text" placeholder="DESCRIPTION">

		</div>
		
		<button class="btn btn-default" type="submit" value="submit">Add</button>
	</form>

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
