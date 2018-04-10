<html>
<head>
    <title>Add Section</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $sectionid = $_POST['sectionid'];
    $sectionname = $_POST['sectionname'];
   
        
    // checking empty fields
if(empty($sectionid) || empty($sectionname)) {                
        if(empty($sectionid)) {
            echo "<font color='red'>Section ID field is empty.</font><br/>";
        }
        
        if(empty($sectionname)) {
            echo "<font color='red'>Section Name field is empty.</font><br/>";
        }
        
		
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO section(sectionid,sectionname) VALUES('$sectionid','$sectionname')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>