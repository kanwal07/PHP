<html>
	<body>
		<h2>Temperature Conversion</h2>
		<form>
			<label>Temperature (C): </label>
			<input type="text" name="celsius"/>
			
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			<label>Temperature (F): </label>
			
			<?php 
			if(isset($_GET['celsius']))
			{
			     $celsius = $_GET['celsius'];
			     echo ($celsius * 9/5) + 32;
			}
			?>
			<br/>
			
			<input type="submit" name="submit" value="ok"/>
		</form>		
	</body>
</html>


