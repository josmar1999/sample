<?php
	session_start();
	
	if(!(isset($_SESSION['isloggedin']))){
		header("Location:samplelogin.php");
	}
	
	if($_SESSION['usertype'] == 'Administrator'){
		echo "<script>alert('Not authorized to view this page')</script>";
	}else
		echo "this is user page. welcome".$_SESSION['username'];
?>

<a href = 'samplelogout.php'>Logout</a>