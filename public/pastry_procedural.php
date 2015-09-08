<?php

require_once 'Auth.php';
require_once 'Log.php';
require_once 'Input.php';
require_once 'functions.php';
require_once 'Pastry.php';

// Procedural Code

if(Auth::check() && Input::has('pastry')) {
	$pastryDesired = Input::get('pastry');
	$pastry = new Pastry($pastryDesired);
	$pastry->serve();
}


$doughnut = new Doughnut('cake');
$doughnut->glaze('chocolate');
echo $doughnut->typeOfPastry;
$doughnut->serve();