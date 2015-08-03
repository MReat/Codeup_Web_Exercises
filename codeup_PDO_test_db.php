<?php

define ('DB_HOST', 'mysql:host=127.0.0.1');
define ('DB_NAME', 'dbname=codeup_PDO_test_db');
define ('DB_USER', 'codeup');
define ('DB_PASS', 'codeup');
require_once 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

// Create the query and assign to var
$query = 'CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(240) NOT NULL,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
)';


$users = [
    ['email' => 'jason@codeup.com',   'name' => 'Jason Straughan'],
    ['email' => 'chris@codeup.com',   'name' => 'Chris Turner'],
    ['email' => 'michael@codeup.com', 'name' => 'Michael Girdley']
];

foreach ($users as $user) {
    $query = "INSERT INTO users (email, name) VALUES ('{$user['email']}', '{$user['name']}')";

    $dbc->exec($query);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}

// Run query, if there are errors they will be thrown as PDOExceptions
$dbc->exec($query);