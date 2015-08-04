<?php

// example for deleting (in national parks db exercise)
$deleteSql = 'DELETE FROM national_parks WHERE id = :id';

$deleteStmt = $dbc->prepare($deleteSQl);
$deleteStmt->bindValue(':id', Input::get('id'), PDO::PARAM_INT);
$delete->execute();