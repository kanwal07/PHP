<?php
//for connecting or calling classes

include_once 'dbconfig.php';
include_once 'Teacher.class.php';

try {
    $connection = new PDO("mysql:host = $host; dbname=$dbname",$username,$password);
    echo "You are connected to $dbname database</br>";
    
   /*  --- insert data
    $t1 = new Teacher(500,"Razieh","1234567890","razieh@razieh.com");
    $result = $t1->create($connection);
    if($result == true)
        echo "The teacher with id=500 is added successfully! </br>";
    else 
        $error = $connection->errorInfo(); echo $error[2]."</br>";
        */
    /*----update data*/
  /*  $t2 = new Teacher();
    $t2->setTeacherId(500);
    $t2->setPhone("5149228707");
    $result = $t2->updatePhone($connection);
    if($result==true)
        echo "The teacher with id ".$t2->getTeacherId()."is updated successfully.</br>";
    else 
        $error = $connection->errorInfo(); echo $error[2]."</br>";
        
        
        /*------- delete data--------*/
    /*$t3 = new Teacher();
    $t3->setTeacherId(400);
    $result = $t3->delete($connection);
    if($result == true)
    {
        echo "One row is deleted successfully </br>";
    }
    else {
        $error = $connection->errorInfo();
        echo $error[2]."</br>";
    }
    */
    //----------------------Display all data----------------------
//     $t4 = new Teacher();
//     $listOfTeachers = $t4->getAllTeachers($connection);
//     $t4->displayAllTeachers($listOfTeachers);

    $t5 = new Teacher();
    $t5->setTeacherId(200);
    $t5=$t5->getTeacherById($connection);
    echo Teacher::getHeader();
    echo $t5;
    echo Teacher::getFooter();
}
catch(Exception $exception) {
    $error = $connection.Error[2];
    echo $error;
}

    



?>