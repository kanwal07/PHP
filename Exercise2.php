<?php
/*
 * Suppose the following array
 *          year    klm     price   picture     discount
 * honda    2008    12000   9000    honda.png   10
 * .
 * .
 * .
 * 
 * 1. Add five entries to the previous array
 * 2. Declare the array like : "honda"=>array("year"=>2008,.....) 
 * 3. Display the array like the following output
 * 
 *        honda     |honda.png
 *        12000km
 *        $9000(strike out)
 *        $8100
 *        
 * 4. Display the most expensive cars       
 * 
 * */


//1. & 2. 
$cars = array (
    "Honda"=>array("year"=>2008,"klm"=>12000,"price"=>9000,"picture"=>"<img src=\"images/honda.png\" style=\"height:200px;width:200px;\"/>","discount"=>10),
    "Hyundai"=>array("year"=>2009,"klm"=>13000,"price"=>10000,"picture"=>"<img src=\"images\hyundai.png\" style=\"height:200px;width:200px;\"/>","discount"=>15),
    "BMW"=>array("year"=>2007,"klm"=>14000,"price"=>8000,"picture"=>"<img src=\"images\bmw.png\" style=\"height:200px;width:200px;\"/>","discount"=>20),
    "Jeep"=>array("year"=>2015,"klm"=>5000,"price"=>20000,"picture"=>"<img src=\"images\jeep.png\" style=\"height:200px;width:200px;\"/>","discount"=>5),
);


display($cars);

function display($arr)
{
?>
<html>
<body>
	<table>
	<?php 
	foreach($arr as $key=>$oneVal)
	{
	?>
	<tr>
		<td><strong><?php echo"$key &nbsp&nbsp";?></strong></td>
		<?php
		
		$price = 0;
		$discount = 0;
		$afterDiscount = 0;
		
		foreach($oneVal as $k=>$v)
		{
		    $year = "";
		    $klm = "";
		    $picture ="";
		    if($k=="year")
		    {
		        $year = "$v";
		    }
		    elseif($k=="picture")
		    {
		        $picture = "$v";
		    }
		    elseif($k=="klm")
		    {
		      $klm = "$v km";
		    }
		    elseif($k=="price")
		    {
		        $price = $v;
		    }
		    
		    elseif($k=="discount") 
		    {
		        $discount = $v;
		    }
		    else 
		    {
		        echo "error";
		    }
		        
		    $afterDiscount = $price-(($discount/100)*$price);
		    ?>
		    <td><?php echo $year;?></td>
		    <td><?php echo $picture;?></td></tr>
	    	<tr><td><?php echo $klm;?></td><td></td><td></td></tr>
	    	<tr><td><strike>$<?php echo $price;?></strike></td><td></td><td></td></tr>
	    	<tr><td><?php echo "$afterDiscount";?></td><td></td><td></td></tr>
		    <?php 
		    
		}
		
	}
}
		?>
	
	</table>
</body>
</html>

<?php
/*
// Add new line

$cars["Nissan"]["year"]=2013;
$cars["Nissan"]["klm"]=7000;
$cars["Nissan"]["price"]=15000;
$cars["Nissan"]["picture"]="<img src=\"images/nissan.png\" style=\"height:200px;width:200px;\"/>";
$cars["Nissan"]["discount"]=11;

echo "-------------After adding--------------<br/>";

//display($cars);
*/
?>
