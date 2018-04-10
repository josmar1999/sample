<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $studentid = $_POST['studid'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
	$middleini = $_POST['middleini'];
	$gender = $_POST['gender'];
	$birthday = $_POST['birthday'];
     $bdate = date('Y-m-d',strtotime($birthday));
	 $address = $_POST['address'];
	 $sectionid = $_POST['sectionid'];
	 $parentname = $_POST['parentname'];
        
    // checking empty fields
if(empty($studentid) || empty($lname) || empty($fname) || empty($middleini) || empty($gender) || empty($birthday) || empty($address) || empty($sectionid) || empty($parentname) ) {                
        if(empty($studentid)) {
            echo "<font color='red'>Student ID field is empty.</font><br/>";
        }
        
        if(empty($lname)) {
            echo "<font color='red'>Lastname field is empty.</font><br/>";
        }
        
        if(empty($fname)) {
            echo "<font color='red'>Firstname field is empty.</font><br/>";
        }
		
		if(empty($middleini)) {
			echo "<font color='red'>MidInitial field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>Gender field is empty.</font><br/>";
		}
		
		if(empty($birthday)) {
			echo "<font color='red'>Birthday field is empty.</font><br/>";
		}
		
		if(empty($address)) {
			echo "<font color='red'>Address field is empty.</font><br/>";
		}
		
        if(empty($sectionid)) {
			echo "<font color='red'>Section ID field is empty.</font><br/>";
		}
		
		if(empty($parentname)) {
			echo "<font color='red'>Parent ID field is empty.</font><br/>";
		}
		
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO student(studentid,lname,fname,middleini,gender,birthday,address,sectionid,parentname) VALUES('$studentid','$lname','$fname','$middleini','$gender','$birthday','$address','$sectionid','$parentname')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='viewsections.php'>View Result</a>";
    }
}
?>
</body>
</html>