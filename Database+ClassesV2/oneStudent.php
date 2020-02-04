
<html>
<body>

<?php
include_once 'dbconfig.php';
include 'Student.class.php';

try {
    $connection = new PDO("mysql:host = $host; dbname=$dbname",$username,$password);
    echo "You are connected to $dbname database</br>";
    echo "Select Student id </br>";
    
    $st1 = new Student();
    $listOfStudentId = $st1->getAllStudentId($connection);
    ?>
    <form method="post">
    <select id="student_id" name="student_id">
    <?php 
    foreach($listOfStudentId as $oneId)
    {
        echo "<option value='$oneId'>$oneId</option>";
    }
    ?></select>
    <input type="submit" name="submit" value="Select"/>
    </form>
    
<?php 
   if(isset($_POST['submit']))
   {
        $st2 = new Student();
        $st2->setStudentId($_POST['student_id']);
        //$st2->setStudentId(1);
        
        $student = $st2->getStudentById($connection);
        
        echo  Student::getHeader();
        echo $student;
        echo Student::getFooter();
    }
    
}
catch(Exception $exception) {
    $error = $connection.Error[2];
    echo $error;
}

?>

<a href="main.php">Return to main page</a>

</body>
</html>
