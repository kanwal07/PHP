<?php
require_once 'dbconfig.php';

$sqlStmt = "SELECT * from teacher";
$queryId = mysqli_query($connectionId,$sqlStmt);

echo "<table border=1>";
echo "<tr><th>Teacher Id</th><th>Name</th><th>Phone</th><th>Email</th></tr>";
//Scalar
/*
while($row = mysqli_fetch_array($queryId)){
   //mysqli_fetch_array works only with scalar array
    $teacherId = $row[0];
    $name = $row[1];
    $phone = $row[2];
    $email = $row[3];
    
    echo "<tr><td>$teacherId</td><td>$name</td><td>$phone</td><td>$email</td></tr>";
}
*/

//Associative
while($row = mysqli_fetch_assoc($queryId)){
    //mysqli_fetch_assoc works only with associative array
    $teacherId = $row["teacherId"];
    $name = $row["name"];
    $phone = $row["phone"];
    $email = $row["email"];
    
    echo "<tr><td>$teacherId</td><td>$name</td><td>$phone</td><td>$email</td></tr>";
}

echo "</table>";



//number of teachers
$nbTeachers = mysqli_num_rows($queryId); //allows to find how many rows in the database
// at the same time we can check whether there are rows in the array or not

echo "</br>";
echo "The total number of teachers are $nbTeachers </br>";



?>