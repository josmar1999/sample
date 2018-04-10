

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="#" method="POST">

	<input type="text" name="name">
	<input type="submit" name="submit" id="submit">
	</form>
</body>
</html>
<?php
if (isset($_POST['submit'])){
	$input = $_POST['name'];

	echo $input."<br>";
	echo strrev($input);
}

?>