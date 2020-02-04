<?php
require_once 'dbconfig.php';

$sqlStmt = "update teacher set phone='0987098709' where name='Razieh'";

$queryId = mysqli_query($connectionId, $sqlStmt);

if($queryId==true)
    echo "<h2>Teacher updated successfully.</h2>";
else
    echo "<h2>".mysqli_error($connectionId)."</h2>";
?>

<a href="manipulateDatabase.php">Return</a><br/>

