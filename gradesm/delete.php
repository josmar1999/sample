<?php

//including the database connection file
include("config.php");
 
//getting id of the data from url
$studentid = $_GET['studid'];
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM student WHERE studentid = $studentid");
 
//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>