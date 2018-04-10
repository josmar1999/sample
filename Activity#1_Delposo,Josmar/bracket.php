<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="#" method="POST">
	<input type="text" name="brac">
	<input type="submit" name="submit">

</form>
</body>
</html>
<?php
if(isset($_POST['submit'	])){
	$string = $_POST['brac'];

if (substr_count($string, '{') !== substr_count($string, '}'))
{
	echo $string;
	echo "<br>";
    echo "NOT VALID";       
}
else{
	echo $string;
	echo "<br>";
	echo "VALID";
}
}