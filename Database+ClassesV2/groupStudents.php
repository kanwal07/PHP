
<html>
<body>

<?php
include_once 'dbconfig.php';
include_once 'Group.class.php';
include 'Student.class.php';

try {
    $connection = new PDO("mysql:host = $host; dbname=$dbname",$username,$password);
    echo "You are connected to $dbname database</br>";
    
    echo "Select group id</br>";
    
    
    $gp1 = new Group();
    $listOfGroups = $gp1->getAllGroupId($connection);
    ?>
    <form method="post">
    <select id="group_id" name="group_id">
    <?php 
    foreach($listOfGroups as $oneGroup)
    {
        echo "<option value='$oneGroup'>$oneGroup</option>";
    }
    ?></select>
    <input type="submit" name="submit" value="Select"/>
    </form>
<?php 

    if(isset($_POST['submit']))
    {
        $gp2 = new Group();
        $gp2->setGroupId($_POST['group_id']);
        $listOfStudents = $gp2->getStudentByGroup($connection);
         echo  Student::getHeader();
         echo $listOfStudents;
//          foreach($listOfStudents as $oneStudent){
//              echo $oneStudent;
//          }
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
