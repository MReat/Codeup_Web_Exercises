<?php

define ('DB_HOST', 'mysql:host=127.0.0.1');
define ('DB_NAME', 'dbname=employees');
define ('DB_USER', 'codeup');
define ('DB_PASS', 'codeup');
require_once 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";