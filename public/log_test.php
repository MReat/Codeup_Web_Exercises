<?php  
require_once 'Log.php';

$log = new Log(false);

$log->info("Test Successful");
$log->error("Error");

?>