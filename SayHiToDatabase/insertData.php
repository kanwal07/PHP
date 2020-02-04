<?php
require_once 'dbconfig.php';

$sqlStmt = "insert into teacher values (500,'Razieh','1234567890','razieh@razieh.razieh')";

$queryId = mysqli_query($connectionId, $sqlStmt);

if($queryId==true)
    echo "<h2>A new teacher is added successfully.</h2>";
else 
    echo "<h2>".mysqli_error($connectionId)."</h2>";
?>

<a href="manipulateDatabase.php">Return</a><br/>