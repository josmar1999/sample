<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $sectionid = $_POST['sectionid'];
    $sectionname=$_POST['sectionname'];
	
    
    // checking empty fields
    if(empty($sectionid) || empty($sectionname)) {            
        if(empty($sectionid)) {
            echo "<font color='red'>Section ID field is empty.</font><br/>";
        }
        
        if(empty($sectionname)) {
            echo "<font color='red'>Section Name field is empty.</font><br/>";
        }
        
		
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE section SET sectionname='$sectionname' WHERE secid=$sectionid");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$sectionid = $_GET['sectionid'];
 
//selecting data associated with this particular id
$sql = mysqli_query($mysqli, "SELECT * FROM student WHERE sectionid=$sectionid");
 
while($result = mysqli_fetch_array($sql))
{
	$sectionid = $result[0];
	$sectionname = $result[1];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="indexsection.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
				<td>Section ID</td>
				<td><input type="text" name="sectionid"></td>
			</tr>
			<tr> 
                <td>Section Name</td>
                <td><input type="text" name="sectionname"></td>
            </tr>
			<tr>
                <td><input type="hidden" name="sectionid" value=<?php echo $_GET['sectionid'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>