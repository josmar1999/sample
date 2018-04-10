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
	<form action = viewsec.php method= 'post'>
	 <input type="submit" class="btn btn-default" name="login" id="btn-login" value = "Section S010">
			</button> 
	</form>
	<form action = viewsec1.php method= 'post'>
	 <input type="submit" class="btn btn-default" name="login" id="btn-login" value = "Section S011">
			</button> 
	</form>
	<form action = viewsec2.php method= 'post'>
	 <input type="submit" class="btn btn-default" name="login" id="btn-login" value = "Section S012">
			</button> 
	</form>
	<form action = viewsec3.php method= 'post'>
	 <input type="submit" class="btn btn-default" name="login" id="btn-login" value = "Section S013">
			</button> 
	</form>
	<form action = viewsec4.php method= 'post'>
	 <input type="submit" class="btn btn-default" name="login" id="btn-login" value = "Section S014">
			</button> 
	</form>
	
	<a href = 'samplelogout.php'>Logout</a>
	
	
</body>
</html>