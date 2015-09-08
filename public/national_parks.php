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

//errors array to store caught execeptions
$errors = [];


if (!empty($_POST)){
    // try {
    // 	foreach($_POST as $key => $value) {
    // 		if ($value == '') {
    // 			throw new Exception ("Please add complete information to following: {'$key'}");
    // 		}
    // 	}

    	$formData[] = $_POST;

	    $stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
	            VALUES (:name, :location, :date_established, :area_in_acres, :description)');

	    foreach ($formData as $data) {
	    	try {
			    $stmt->bindValue(':name', escape(Input::getString('name')), PDO::PARAM_STR);
			} catch (Exception $e) {
				$errors[] = $e->getMessage();
			}
			
			try {
			    $stmt->bindValue(':location',  escape(Input::getString('location')),  PDO::PARAM_STR);
			} catch (Exception $e) {
				$errors[] = $e->getMessage();
			}
			
			try {
			    $stmt->bindValue(':date_established',  escape(Input::getString('date_established')),  PDO::PARAM_STR);
			} catch (Exception $e) {
				$errors[] = $e->getMessage();
			}

			try {
			    $stmt->bindValue(':area_in_acres', escape(Input::getNumber('area_in_acres')),  PDO::PARAM_INT);
			} catch (Exception $e) {
				$errors[] = $e->getMessage();
			}

			try {
		    $stmt->bindValue(':description',  escape(Input::getString('description')),  PDO::PARAM_STR);

			} catch (Exception $e) {
				$errors[] = $e->getMessage();
			}

			if(empty($errors)){
			    $stmt->execute();
			}
		}
		
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

		<? if(isset($errors)) : ?>
			<ul>
			<? foreach ($errors as $error) : ?>
				<li><? $error; ?></li>
			<? endforeach; ?>
			</ul>
		<? endif; ?>

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
				<input class="form-control" id="name" name="name" type="text" value="<? escape(Input::getString('name')); ?>" placeholder="NAME" min="1" max="200">

				<label for="location">Location</label>
				<input class="form-control" id="location" name="location" type="text" value="<? escape(Input::getString('location')); ?>" placeholder="LOCATION" min="1" max="200">

				<label for="date_established">Date Established</label>
				<input class="form-control" id="date_established" name="date_established" type="date" value="<? escape(Input::getString('date_established')); ?>"placeholder="DATE ESTABLISHED" min="1" max="200">

				<label for="area_in_acres">Area (in acres)</label>
				<input class="form-control" id="area_in_acres" name="area_in_acres" value="<? escape(Input::getNumber('area_in_acres')); ?>" type="number" placeholder="AREA" min="1" max="20">

				<label for="description">Description</label>
				<textarea class="form-control" id="description" name="description" value="<? escape(Input::getString('description')); ?>" placeholder="DESCRIPTION"min="1" max="2000"></textarea>

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
