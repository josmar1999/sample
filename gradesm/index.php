<?php
//including the database connection file

include_once("config.php");
$con = mysqli_connect("localhost", "root", "", "grademsys");

session_start();
	
	if(!(isset($_SESSION['isloggedin']))){
		header("Location:samplelogin.php");
	}
	
	if($_SESSION['usertype'] == 'User'){
		echo "<script>alert('Not authorized to view this page')</script>";
	}else
		echo "<h2>Administrator Page</h2> Welcome ".$_SESSION['username'];
	
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM student ORDER BY studentid DESC"); // mysql_query is deprecated
//$result = mysqli_query($mysqli, "SELECT * FROM student ORDER BY studentid DESC"); // using mysqli_query instead
?>
<br>
<br>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
    <a href="add.html">Add New Data</a><br/><br/>
	<form action = viewsec.php method= 'post'>
	 <input type="submit" class="btn btn-default" name="login" id="btn-login" value = "Section S010">
			</button> 
	</form>
	<form action = viewsec1.php method= 'post'>
	 <input type="submit" class="btn btn-default" name="login" id="btn-login" value = "Section S011">
			</button> 
	</form>
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
		
		$query = "";
		if(isset($_POST['searchStudent'])){
		$studentid = $_POST['studid'];
		$query = "CALL searchStudent('{$studentid}')";
		}else{
		$query = "CALL getStudent()";
		}
	$sql=mysqli_query($con, $query) or die("Error:".mysqli_error());
		
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($sql)) {   
            echo "<tr>";
            echo "<td>".$res[0]."</td>";
            echo "<td>".$res[1]."</td>";
            echo "<td>".$res[2]."</td>";
			echo "<td>".$res[3]."</td>";
			echo "<td>".$res[4]."</td>";
			echo "<td>".$res[5]."</td>";
			echo "<td>".$res[6]."</td>";
			echo "<td>".$res[7]."</td>";
			echo "<td>".$res[8]."</td>";
            echo "<td><a href=\"edit.php?studid=$res[studentid]\">Edit</a> | <a href=\"delete.php?studid=$res[studentid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
		
    </table>
	<br>
	<form action = "index.php" method = "post">
	Search: <input type = 'text' name = 'studid' placeholder = 'studentid' size = '15' autocomplete = 'off'>
			<input type = 'submit' value = 'Search' name = 'searchStudent' >
	</form> 
	
	<a href = 'samplelogout.php'>Logout</a>
	
	
</body>
</html>