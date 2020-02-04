<?php
/*
 * Suppose the following Scalar -> Associative array of employee's salary
 * 0-> jan-1600, feb-1650,apr-1600,jun-1800,jul-1900
 * 1-> mar-2300,jun-2100,jul-2400
 * 2-> jan-2400,mar-2200,apr-2400,jul-2100,aug-2200
 * 
 * 1. Declare the array $empSalary
 * 2. Display the array $empSalary (create a function)
 * 3. Create a function that displays
 *      -the maximum of salary
 *      -the minimum of salary
 *      -the average of salary
 * 4. Add to array empSalary the maximum, minimum and average of the salary
 * 5. Display the new array*/


//1.
$empSalary = array( array("jan"=>1600,"feb"=>1650,"apr"=>1600,"jun"=>1800,"jul"=>1900),
                    array("jul"=>2400,"mar"=>2300,"jun"=>2100),
                    array("jan"=>2400,"mar"=>2200,"apr"=>2400,"jul"=>2100,"aug"=>2200)
);


//2.
display($empSalary);
function display($arr)
{
    $i = 1;
    foreach($arr as $oneDim)
    {
        echo "The Salaries of the employees are $i >> ";
        foreach($oneDim as $key=>$value)
        {
           echo "($key, $value) &nbsp;&nbsp;";
        }
        echo "<hr/>";
        $i++;
    }
}

echo "<br/><br/><hr/>";

//3.

maxSalary($empSalary);


function maxSalary($arr){
    $maxArr = array();
    foreach($arr as $oneDim)
    {
        $max = 0;
        $maxKey = "";
        foreach($oneDim as $key=>$value)
        {
            if($value > $max) 
            {
                $max = $value;
                $maxKey = $key;
            }
            
        }
        //echo "The maximum salary is: ($maxKey,$max)</br>";
        $maxArr = array("Max Value: ".$maxKey=>$max);
    }
    
    return $maxArr;
}

echo "<br/><br/>";

minSalary($empSalary);

function minSalary($arr)
{
    $minArr = array();
    foreach($arr as $oneDim)
    {
        $min = 100000;
        $minKey = "";
        foreach($oneDim as $key=>$value)
        {
            if($value < $min)
            {
                $min = $value;
                $minKey = $key;
            }
        }
       // echo "The minimun salary is : ($minKey, $min)</br>";
        $minArr=array("Min Value: ".$minKey=>$value);
    }
    
    return $minArr;
}

echo "<br/><br/>";
averageSalary($empSalary);

function averageSalary($arr){
   $avg = [];
    foreach($arr as $oneDim)
    {
        $total = 0; $i=0;
        foreach($oneDim as $value)
        {
            $total += $value;
            $i++;
        }
        
        //echo "The average salary is : ".($total/$i)."</br>";        
        $avg[] = $total/$i; 
    }
    return "Avg value: ".$avg;
}

//4. to add a single array to a multiarray**************************
echo "</br></br>";
addToArray($empSalary);

function addToArray($arr)
{
    foreach($arr as $oneDim)
    {
        $oneDim[] = findMax($arr);
    }
}

echo "</br></br>";
display($empSalary);
?>