<?php 

require_once '../parks_config.php';
require_once '../db_connect.php';
require_once '../functions.php';
require_once '../Input.php';


$limit = 4;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$count = $dbc->query('SELECT COUNT(*) FROM national_parks')->fetchColumn();
$numberOfPages = ceil($count / $limit);

$parks = $dbc->prepare("SELECT * FROM national_parks LIMIT :limit OFFSET :offset");

//bind
$parks->bindValue(':limit', $limit, PDO::PARAM_INT);
$parks->bindValue(':offset', $offset, PDO::PARAM_INT);


//execute
$parks->execute();
$parks = $parks->fetchAll(PDO::FETCH_ASSOC);


if (!empty($_POST)){
    $stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
            VALUES (:name, :location, :date_established, :area_in_acres, :description)');
    $stmt->bindValue(':name', escape(Input::get('name')), PDO::PARAM_STR);
    $stmt->bindValue(':location',  escape(Input::get('location')),  PDO::PARAM_STR);
    $stmt->bindValue(':date_established',  escape(Input::get('date_established')),  PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres',  str_replace(',', '', escape(Input::get('area_in_acres'))),  PDO::PARAM_STR);
    $stmt->bindValue(':description',  escape(Input::get('description')),  PDO::PARAM_STR);
    $stmt->execute();
}

?>

<html>
<head>
	<title>National Parks (PHP)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/national_parks_custom.css">
</head>
<body>

	<div class="container">
		<h1>National Parks</h1>
		<div class="col-md-9" id="park">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th>Date Established</th>
					<th>Area (in acres)</th>
					<th>Description</th>
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
	<div class="col-md-3 well" id="add_park">
		<form method="POST" action="national_parks.php">
		  <h2>Add Park</h2>
			<div class="form-group">

				<label for="name">Name:</label>
				<input class="form-control" id="name" name="name" type="text" placeholder="NAME">

				<label for="location">Location</label>
				<input class="form-control" id="location" name="location" type="text" placeholder="LOCATION">

				<label for="date_established">Date Established</label>
				<input class="form-control" id="date_established" name="date_established" type="date" placeholder="DATE ESTABLISHED">

				<label for="area_in_acres">Area (in acres)</label>
				<input class="form-control" id="area_in_acres" name="area_in_acres" type="text" placeholder="AREA">

				<label for="description">Description</label>
				<textarea class="form-control" id="description" name="description" placeholder="DESCRIPTION"></textarea>

			</div>
			
			<button class="btn btn-default" type="submit" value="submit">Add</button>
		</form>
	</div>
	
</div>
	<div class="row">
		<ul class="pager">
			<? // pagination ?>

			<? if ($page != 1) :?>
			<li><a href="?page=<?= ($page - 1) ?>">PREVIOUS</a></li>
		<? endif ?>

		<? if ($page < $numberOfPages) :?>
		<li><a href="?page=<?= ($page + 1) ?>">NEXT</a></li>
		<? endif ?>
		</ul>
	</div>
</body>
</html>
