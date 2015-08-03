<?php  
define ('DB_HOST', 'mysql:host=127.0.0.1');
define ('DB_NAME', 'dbname=parks_db');
define ('DB_USER', 'parks_user');
define ('DB_PASS', '');
require_once 'db_connect.php';

$drop = 'DROP TABLE IF EXISTS "national_parks"';
$dbc->exec($drop);

$create = 'CREATE TABLE national_parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    location VARCHAR(200) NOT NULL,
    date_established DATE NOT NULL,
    area_in_acres FLOAT(20,2) NOT NULL,
    PRIMARY KEY (id)
)';


$dbc->exec($create);


?>