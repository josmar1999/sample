<?php
// including the database connection file
$conn = mysqli_connect("localhost","root","","grademsys");
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $studentid = $_POST['studentid'];
    $lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$midini=$_POST['middleini'];
	$gender=$_POST['gender'];
	$Birthday=$_POST['birthday'];
	$Address=$_POST['address'];
    $sectionid=$_POST['sectionid'];   
	$parentname=$_POST['parentname'];
    
    // checking empty fields
    if(empty($studentid) || empty($lname) || empty($fname) || empty($midini) || empty($gender) || empty($Birthday) || empty($Address) || empty($sectionid) || empty($parentname)) {            
        if(empty($studentid)) {
            echo "<font color='red'>Student ID field is empty.</font><br/>";
        }
        
        if(empty($lname)) {
            echo "<font color='red'>Firstname field is empty.</font><br/>";
        }
        
        if(empty($fname)) {
            echo "<font color='red'>address field is empty.</font><br/>";
        } 
		
		if(empty($midini)) {
			echo "<font color='red'>Middle Initial field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>Gender field is empty.</font><br/>";
		}
		
		if(empty($Birthday)) {
			echo "<font color='red'>Birthday field is empty.</font><br/>";
		}
		
		if(empty($Address)) {
			echo "<font color='red'>Address field is empty.</font><br/>";
		}
		
		if(empty($sectionid)) {
			echo "<font color='red'>Section ID field is empty.</font><br/>";
		}
		
		if(empty($parentname)) {
			echo "<font color='red'>Parent ID field is empty.</font><br/>";
		}
		
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE student SET lname='$lname',fname='$fname',middleini='$midini',Gender='$gender',Birthday='$Birthday',address='$Address',sectionid='$sectionid',parentid='$parentname' WHERE studentid=$studentid");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$studentid = $_GET['studid'];
 
//selecting data associated with this particular id
$sql = mysqli_query($mysqli, "SELECT * FROM student WHERE studentid=$studentid");
 
while($row = mysqli_fetch_array($sql))
{
	$studentid = $row['studentid'];
	$lname = $row['lname'];
    $fname = $row['fname'];
    $middleini = $row['middleini'];
	$gender = $row['gender'];
	$birthday = $row['birthday'];
    $address = $row['address'];
	$sectionid = $row['sectionid'];
	$parentname = $row['parentid'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
				<td>Student ID</td>
				<td><input type="text" name="studid" value = <?php echo $studentid; ?>></td>
			</tr>
			<tr> 
                <td>Lastname</td>
                <td><input type="text" name="lname" value = <?php echo $lname; ?>></td>
            </tr>
			<tr>
				<td>Firstname</td>
				<td><input type="text" name="fname" value = <?php echo $fname; ?>></td>
			</tr>
			<tr> 
				<td>MidInitial</td>
				<td><input type="text" name="middleini" value = <?php echo $middleini; ?>></td>
			</tr>
            <tr> 
                <td>Gender</td>
                <td><input type="text" name="gender" value = <?php echo $gender; ?>></td>
            </tr>
            <tr> 
                <td>Birthday</td>
                <td><input type="text" name="birthday" value = <?php echo $birthday; ?>></td>
            </tr>
             <tr> 
                <td>Address</td>
                <td><input type="text" name="address" value = <?php echo $address; ?>></td>
            </tr>
			<tr> 
				<td>Section ID</td>
				<td><input type="text" name="sectionid" value = <?php echo $sectionid; ?>></td>
			</tr>
			<tr>
				<td>Parent Name</td>
				<td><input type="text" name="parentname" value = <?php echo $parentname; ?>></td>
			</tr>
			<tr>
                <td><input type="hidden" name="studentid" value=<?php echo $_GET['studid'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>