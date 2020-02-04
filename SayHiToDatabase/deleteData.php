<?php
require_once 'dbconfig.php';

$sqlStmt = "delete from teacher where teacherId=500";

$queryId = mysqli_query($connectionId, $sqlStmt);

if($queryId==true)
    echo "<h2>Teacher deleted successfully.</h2>";
else
    echo "<h2>".mysqli_error($connectionId)."</h2>";
        ?>

<a href="manipulateDatabase.php">Return</a><br/>

