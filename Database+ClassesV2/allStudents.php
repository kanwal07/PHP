<?php 
include_once 'dbconfig.php';
include 'Student.class.php';


try {
    $connection = new PDO("mysql:host = $host; dbname=$dbname",$username,$password);
    echo "You are connected to $dbname database</br>";
    
    $st1 = new Student();
    echo Student::getHeader();
    $listOfStudents = $st1->getAllStudents($connection);
    foreach($listOfStudents as $oneStudent)
    {
        echo $oneStudent;
    }
    echo Student::getFooter();
}
catch(Exception $exception) {
    $error = $connection.Error[2];
    echo $error;
}

?>

<html>
<body>
<a href="main.php">Return to main page</a>
</body>
</html>
