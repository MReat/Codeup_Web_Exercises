<?php
// Get new instance of PDO object
// $dbc = new PDO('mysql:host=127.0.0.1;dbname=employees', 'codeup', 'codeup');

// define ('DB_HOST', 'mysql:host=127.0.0.1');
// define ('DB_NAME', 'dbname=employees');
// define ('DB_USER', 'codeup');
// define ('DB_PASS', 'codeup');

$dbc = new PDO (DB_HOST . ';' . DB_NAME, DB_USER, DB_PASS);


// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


// echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";