<?php
//including the database connection file

include_once("config.php");
$con = mysqli_connect("localhost", "root", "", "grademsys");
	

	session_start();
	
	if(!(isset($_SESSION['isloggedin']))){
		header("Location:samplelogin.php");
	}
	
	if($_SESSION['usertype'] == 'Administrator'){
		echo "<script>alert('Not authorized to view this page')</script>";
	}else
		echo "<h2>User Page</h2> Welcome ".$_SESSION['username'];

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM student ORDER BY studentid DESC"); // mysql_query is deprecated
//$result = mysqli_query($mysqli, "SELECT * FROM student ORDER BY studentid DESC"); // using mysqli_query instead
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
	<br>
	<br>
    <a href="add.html">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
        <table border = 1>
		<tr bgcolor='#CCCCCC'>
            <td>studentid</td>
            <td>lname</td>
            <td>fname</td>
            <td>middleini</td>
			<td>gender</td>
			<td>birthday</td>
			<td>address</td>
			<td>sectionid</td>
			<td>parentname</td>
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