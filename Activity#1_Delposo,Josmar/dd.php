<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="#" method="POST">
<input type="text	" name="dividend" placeholder="Dividend">
<br>
<input type="text" name="divisor" placeholder="Divisor">
<input type="submit" name="submit">
</form>
</body>
</html>

<?php
if (isset($_POST['submit'])){
	$dend = $_POST['dividend'];
	$sor = $_POST['divisor'];

	$res = $dend / $sor;
	$rem = fmod($dend, $sor);

	echo "Quotient is:"; echo round($res);
	echo "<br>";
	echo "Remainder"$sor;

}

?>