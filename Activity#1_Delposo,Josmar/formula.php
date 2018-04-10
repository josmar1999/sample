<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="#" method="POST">

	<label>Input the Celsuis</label>
	<input type="text" name="temp">
<br>

	<input type="submit" name="submit" id="submit">
	</form>
</body>
</html>
<?php
if (isset($_POST['submit'])){
	$temp = $_POST['temp'];
	$add = 273.15;
	$cal = 0;


	$cal = $add + $temp;

	echo "Celsuis is:".$temp;
	echo "<br>"; 
	echo "Kelvin is:".$cal;

	
	

}

?>