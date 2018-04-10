<?php
session_start();
	
	
	if(!(isset($_SESSION['isloggedin']))){
		header("Location:action.php");
	}
	$con = mysqli_connect ("localhost","root","","grademsys") or die(mysqli_error());
	if(isset($_POST['Save'])){
		$studentid = $_POST['studentid'];
		$studentidorig = $_POST['studentidorig'];
		$lname = $_POST['lname'];
		$fname = $_POST['fname'];
		$middleini = $_POST['middleini'];
		$gender = $_POST['gender'];
		$birthday = $_POST['birthday'];
		$address = $_POST['address'];
		$sectionid = $POST['sectionid'];
		$parentname = $_POST['parentname'];
		
		
		$sql = "UPDATE student SET studentid = '{$studentid}', lname = '{$lname}',fname = '{$fname}',middleini = '{$middleini}', gender = '{$gender}', birthday = '{$birthday}',
			address = '{$address}',sectionid = '{$sectionid}',parentname = '{$parentname}'
		WHERE studentid = '{$studentidorig}'";
		mysqli_query($con,$sql) or die("Error: ".mysqli_error);
		
		header("Location: index.php");
	}
?>

<html>
	<head></head>
	<body>
		<form action = 'edit1.php' method = 'post'>
		<input type = "text" name = 'studentidorig' placeholder = 'studentid' value = <?php echo $_GET['studentid'];?>><br>
			<input type = "text" name = 'studentid' placeholder = 'studentid' value = <?php echo $_GET['studentid'];?>><br>
			<input type = "text" name = 'lname' placeholder = 'lname' value = <?php echo $_GET['lname'];?>><br>
			<input type = "text" name = 'fname' placeholder = 'fname' value = <?php echo $_GET['fname'];?>><br>
			<input type = "text" name = 'middleini' placeholder = 'middleini' value = <?php echo $_GET['middleini'];?>><br>
			<input type = "text" name = 'gender' placeholder = 'gender' value = <?php echo $_GET['gender'];?>><br>
			<input type = "date" name = 'date' placeholder = 'birthday' value = <?php echo $_GET['birthday'];?>><br>
			<input type = "text" name = 'address' placeholder = 'address' value = <?php echo $_GET['address'];?>><br>
			<input type = "text" name = 'sectionid' placeholder = 'sectionid' value = <?php echo $_GET['sectionid'];?>><br>
			<input type = "text" name = 'parentname' placeholder = 'parentname' value = <?php echo $_GET['parentname'];?>><br>
			<input type = 'submit' name = 'edit1' value = 'Update Info'><br>
		</form>
	</body>
</html>