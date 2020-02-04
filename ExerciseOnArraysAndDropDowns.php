<?php

//Exercise: suppose the following associative array
/*
 *job_id        job_title
 * 670          Manager
 * 667          Analyst
 * 669          Programmer
 * 668          Clerk
 * 671          Admin
 *
 *
 * 1. Sort the associactive array in increasing order of job title
 * 2. Build the user interface (html, javascript)
 * list of jobs : -----------------(drop down)
 * job id: <label>
 * job title: <label>
 *
 * when you select the job from the list, you automatically display jobid and job title
 * */


//1. sorting

$jobArr = array("Manager"=>670,"Analyst"=>667,"Programmer"=>669,"Clerk"=>668,"Admin"=>671);

echo "------BEFORE SORT----<br/>";
display($jobArr);

echo "------AFTER SORT-----<br/>";
ksort($jobArr);

display($jobArr);

function display($arr)
{
    foreach($arr as $key=>$value)
    {
        echo "$key => $value <br/>";
    }
}

?>


<html>
<body>
<hr>
<label>List of jobs: &nbsp;</label>
<select id='jobTitle' onChange="fetchJobTitle(this); fetchJobId(this);">
<?php 
foreach($jobArr as $key=>$value)
{
    echo "<option value='".$value."'>".$key."</option>";
}


?>
</select><br/>
		<label>Job id: </label>

		<label id="job_id"></label> <br/>
		
		<label>Job Title: </label>
		
		<label id="job_title"></label>
		
	</body>
	<script>

	function fetchJobId(e) {
		var id = e.options[e.selectedIndex].value ;
		document.getElementById('job_id').innerHTML = id;
		}
	
	function fetchJobTitle(e) {

		  var title= e.options[e.selectedIndex].text ;
		  document.getElementById('job_title').innerHTML = title;
		}
			
			
	</script>
</html>

