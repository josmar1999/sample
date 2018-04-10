<?php
	$con = mysqli_connect ("localhost","root","","grademsys") or die(mysqli_error());
	if(isset($_GET['delete'])){
		$studentid = $_GET['studentid'];
		$sql = "DELETE FROM student WHERE studentid = '{$studentid}'";
		mysqli_query($con,$sql) or die(mysqli_error());
		header("Location: index2.php");
	}
?>

<html>
	<head></head>
	<body>
	<h1> GRADE MONITORING SYSTEM </h1>
		<table border = 1>
		<form action = viewsec.php method= 'post'>
	 <input type="submit" class="btn btn-default" name="login" id="btn-login" value = "Section S010">
			</button> 
	</form>
			<tr>
				<td>Student ID</td>
				<td>Last Name</td>
				<td>First Name</td>
				<td>Middle Initial</td>
				<td>Gender</td>
				<td>Birthday</td>
				<td>Address</td>
				<td>Section ID</td>
				<td>Parent Name</td>
			</tr>
		<?php
			$sql = "SELECT student.studentid,student.lname,student.fname,student.middleini,student.gender,student.birthday,
			student.address,student.sectionid,student.parentname FROM student";
			
			$result = mysqli_query($con,$sql) or die();
			
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>".$row['studentid']."</td>";
				echo "<td>".$row['lname']."</td>";
				echo "<td>".$row['fname']."</td>";
				echo "<td>".$row['middleini']."</td>";
				echo "<td>".$row['gender']."</td>";
				echo "<td>".$row['birthday']."</td>";
				echo "<td>".$row['address']."</td>";
				echo "<td>".$row['sectionid']."</td>";
				echo "<td>".$row['parentname']."</td>";
				echo "<td>";
		?>
			<form action = 'edit2.php' action = 'post'>
				<input type = 'hidden' name = 'studentid' value = <?php echo $row[0]; ?>>
				<input type = 'hidden' name = 'lname' value = <?php echo $row[1]; ?>>
				<input type = 'hidden' name = 'fname' value = <?php echo $row[2]; ?>>
				<input type = 'hidden' name = 'middleini' value = <?php echo $row[3]; ?>>
				<input type = 'hidden' name = 'gender' value = <?php echo $row[4]; ?>>
				<input type = 'hidden' name = 'birthday' value = <?php echo $row[5]; ?>>
				<input type = 'hidden' name = 'address' value = <?php echo $row[6]; ?>>
				<input type = 'hidden' name = 'sectionid' value = <?php echo $row[7]; ?>>
				<input type = 'hidden' name = 'parentname' value = <?php echo $row[8]; ?>>
				<input type = 'submit' name = 'edit2' value = "Edit Info">
			</form>
			<form action = 'index2.php' action = 'post'>
				<input type = 'hidden' name = 'studentid' value = <?php echo $row[0]; ?>>
				<input type = 'submit' name = 'delete' value = "Delete">
			</form>
		<?php
				echo"</td>";
				echo "</tr>";
			}
		?>	
		</table>
		<form action = 'add.php' method = 'post'>
			<input type = 'submit' value = 'Add Record'>
		</form>
	</body>
</html>