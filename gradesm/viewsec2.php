<?php
 $conn = mysqli_connect("localhost","root","","grademsys");

?>
<html>
<body>
 <table width='80%' border=0>
        <table border = 1>
		<tr bgcolor='#CCCCCC'>
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
			$sec = "S012";
				$sql = "SELECT * from student where sectionid= '$sec'";
				$qry = mysqli_query($conn, $sql);
				$num_rows = mysqli_num_rows($qry);
				if($num_rows > 0 ){
					while($row = mysqli_fetch_array($qry)){ ?>	
						<tr>
                            <td style="padding-top: 14px;"><?php echo $row['studentid'] ?></td>
                            <td style="padding-top: 14px;"><?php echo $row['lname'] ?></td>
							<td style="padding-top: 14px;"><?php echo $row['fname'] ?></td>
							<td style="padding-top: 14px;"><?php echo $row['middleini'] ?></td>
							<td style="padding-top: 14px;"><?php echo $row['gender'] ?></td>
							<td style="padding-top: 14px;"><?php echo $row['birthday'] ?></td>
							<td style="padding-top: 14px;"><?php echo $row['address'] ?></td>
							<td style="padding-top: 14px;"><?php echo $row['sectionid'] ?></td>
							<td style="padding-top: 14px;"><?php echo $row['parentname'] ?></td>
                            <td><a href="edit.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Edit</button></a>
                            <a href="delete.php?id=<?php echo $row['id'] ?>"><button>Delete</button></a></td>
						</tr>
				<?php	}
				} 
				?>
		</table>
</body>
</html>