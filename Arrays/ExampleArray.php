<?php
$colorArr = array("red","green","blue");

display($colorArr);


echo "==================Predefined functions==============<br/>";
echo "The total number of elements is ".count($colorArr)."<br/>";


$pos = array_search("green",$colorArr);
echo "$pos <br/>";


if(!empty($colorArr[$pos]))
    echo "The position of green is $pos <br/>";
else 
    echo "green not found";

$keyExists = array_key_exists(1,$colorArr);
echo "The position is $keyExists <br/>";


$in = in_array("red",$colorArr);
if(!empty($in))
    echo "--The element exists <br/>";
else 
    echo "--The element doesn't exists <br/>";


    
    
function display($arr) {
    
    foreach ($arr as $element)
    {
        echo "$element <br/>";
    }
}

?>