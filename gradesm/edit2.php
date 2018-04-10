<?php
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
		$sectionid = $_POST['sectionid'];
		$parentname = $_POST['parentname'];
		
		$sql = "UPDATE student SET studentid = '{$studentid}', lname = '{$lname}', fname = '{$fname}', middleini = '{$middleini}', gender = '{$gender}', address = '{$address}', sectionid = '{$sectionid}', parentname = '{$parentname}' WHERE studentid = '{$studentidorig}'";
		mysqli_query($con,$sql) or die("Error: ".mysqli_error);
		
		header("Location: index2.php");
	}
?>

<html>
	<head></head>
	<body>
		<form action = 'edit2.php' method = 'post'>
			<input type = "text" name = 'studentidorig' placeholder = 'Student ID' value = <?php echo $_GET['studentid'];?>>
			Student ID <input type = "text" name = 'studentid' placeholder = 'Student ID' value = <?php echo $_GET['studentid'];?>><br>
			Last Name <input type = "text" name = 'lname' placeholder = 'Last Name' value = <?php echo $_GET['lname'];?>><br>
			First Name <input type = "text" name = 'fname' placeholder = 'First Name' value = <?php echo $_GET['fname'];?>><br>
			Middle Initial <input type = "text" name = 'middleini' placeholder = 'Middle Initial' value = <?php echo $_GET['middleini'];?>><br>
			Gender <input type = "text" name = 'gender' placeholder = 'Gender' value = <?php echo $_GET['gender'];?>><br>
			Birthday <input type = "text" name = 'birthday' placeholder = 'Birthday' value = <?php echo $_GET['birthday'];?>><br>
			Address <input type = "text" name = 'address' placeholder = 'Address' value = <?php echo $_GET['address'];?>><br>
			Section ID <input type = "text" name = 'sectionid' placeholder = 'Section ID' value = <?php echo $_GET['sectionid'];?>><br>
			Parent Name <input type = "text" name = 'parentname' placeholder = 'Parent Name' value = <?php echo $_GET['parentname'];?>><br>
			
			<input type = 'submit' name = 'Save' value = 'Update Info'><br>
		</form>
	</body>
</html>