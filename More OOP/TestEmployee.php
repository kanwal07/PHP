<?php
include 'Employee.cls.php';

$emp1 = new Employee("David", "F", 20000, 100);
$emp2 = new Employee("Mary", "P", 10000, 200);
$emp3 = new Employee("Malcom", "T", 5000, 300);
$emp4 = new Employee("Tiffany", "F", 19000, 300);
$emp5 = new Employee("Sam", "P", 11000, 200);
$emp6 = new Employee("Ethan", "T", 8000, 100);

$listOfEmployees[0] = $emp1;
$listOfEmployees[1] = $emp2;
$listOfEmployees[2] = $emp3;
$listOfEmployees[3] = $emp4;
$listOfEmployees[4] = $emp5;
$listOfEmployees[5] = $emp6;

displayEmployee($listOfEmployees);

function displayEmployee($emp)
{
    Employee::header();
    
    foreach($emp as $oneEmployee)
    {
        echo $oneEmployee;
    }
    
    Employee::footer();
}

//after overloading
$emp1->setSalary(21000); // new salary
$emp2->setSalary(10000,500); //add amount to existing salary
$emp3->setSalary('p',0.30); //percentage change

echo "-----After changing salaries-----";

displayEmployee($listOfEmployees);

?>