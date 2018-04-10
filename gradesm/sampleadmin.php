<?php
	session_start();
	
	if(!(isset($_SESSION['isloggedin']))){
		header("Location:samplelogin.php");
	}
	
	if($_SESSION['usertype'] == 'User'){
		echo "<script>alert('Not authorized to view this page')</script>";
	}else
		echo "this is admin page. welcome".$_SESSION['username'];
	
	
?>

<a href = 'samplelogout.php'>Logout</a>