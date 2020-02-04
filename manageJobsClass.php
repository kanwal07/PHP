<script type="text/javascript">
	function assign(){
		//alert("The function is executing");
		listIndex = document.getElementById('list').selectedIndex;
		//alert("The index of the selected element is "+ listIndex);
		listObject = document.getElementById('list').options[listIndex];

		document.getElementById('text').value = listObject.text;
		document.getElementById('value').value = listObject.value;
		
	}
</script>
<?php
include "class.php";
$jobs = array("Manager"=>670,
                "Analyst"=>667,
                "Programmer"=>669,
                "Clerk"=>668,
                "Admin"=>671);
?>
<form>
<?php 
populateJobs($jobs);
?>
<label>Job id: </label><input type="text" id="value"/></br>
<label>Job Type: </label><input type="text" id="text"/></br>
</form>