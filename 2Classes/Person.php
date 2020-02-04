<?php

include_once 'Car.php';

class Person
{
    
    private $name;
    private $age;
    private $listofCars;
    private $sequence=0;
    
    function __construct($name=null,$age=null)
    {
        $this->name=$name;
        $this->age=$age;
        $this->listofCars=array();
    }
    function addCar($car)
    {
        $this->listofCars[$this->sequence++]=$car;
    }
    public function heading()
    {
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Age</th></tr>";
    }
    public function __toString()
    {
        return "<tr><td>$this->name</td><td>$this->age</td></tr>";
    }
    
    public function footer(){
        echo "</table>";
        //We need to add list of cars here
        
        if($this->listofCars != null)
        {
            echo "*****List of cars*****</br>";
            Car::heading();
            foreach($this->listofCars as $oneCar)
            {
                echo $oneCar;
            }
            Car::footer();
        }
    }
}

