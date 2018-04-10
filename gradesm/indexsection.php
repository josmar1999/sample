<html>
<head>    
    <title>Section Page</title>
</head>
 
<body>
    <a href="add.html">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
        <table border = 1>
		<tr bgcolor='#CCCCCC'>
            <td>Student ID</td>
            <td>Last Name</td>
            
        </tr>
        <?php 
	
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($sql)) {   
            echo "<tr>";
            echo "<td>".$res[0]."</td>";
            echo "<td>".$res[1]."</td>";
            
            echo "<td><a href=\"edit.php?secid=$res[sectionid]\">Edit</a> | <a href=\"delete.php?secid=$res[sectionid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
	
	
</body>
</html>