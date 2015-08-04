<?php  
require_once 'parks_config.php';
require_once 'db_connect.php';

$drop = 'DROP TABLE IF EXISTS national_parks';
$dbc->exec($drop);

$create = 'CREATE TABLE national_parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    location VARCHAR(200) NOT NULL,
    date_established DATE NOT NULL,
    area_in_acres FLOAT(20,2) NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (id)
)';


$dbc->exec($create);


?>