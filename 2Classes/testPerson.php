<?php

include 'Car.php';
include 'Person.php';

$car0 = new Car(100,"Toyata Corolla",2010);
$car1 = new Car(200,"Honda Civic",2006);
$car3 =  new Car(300,"Hunday",2012);


$p0 =  new Person("David",24);

$p0->addCar($car0);
$p1->addCar($car1);

echo Car::heading();
echo $car0;
echo Car::footer();

echo "<br/>";
echo Person :: heading();
echo $p0;
echo Person::footer();
?>