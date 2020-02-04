<?php
    $article = array("mouse"=>10,"keyboard"=>20,"screen"=>30);
    
    display($article);
    
    //changing values of the array
    $article["mouse"]=35;
    $article["pen"]=40; //adds the item at the end of the array if it doesn't exists
   
    
    echo "============= After Change ========= <br/>";
    display($article);
    
    
    echo "=====After Sorting the array=====<br/>";
    //scalar array
    sort($article); //ascending order of 'values'
    echo "<br/>SORT<br/>";
    display($article);
    
    echo "<br/>RSORT<br/>";
    rsort($article);// descending order of 'values'
    display($article);
    
    
    //associative array
    
    echo "<br/>ARSORT<br/>"; // asc order of keys
    arsort($article);
    display($article);
    echo "<br/>";
    
    echo "<br/>ASORT<br/>"; // desc order of keys
    asort($article);
    display($article);
    echo "<br/>";
    
    //sorting the keys
    ksort($article);
    display($article);
    echo "<br/>";
    krsort($article);
    display($article);
    echo "<br/>";
    
    //homework
    //usort($article);
    //display($article);
    //echo "";
    //uasort($article);
    function display($arr) {
        
        foreach ($arr as $key=>$val)
        {
            echo "The quantity of $key is $val <br/>";
        }
    }
?>