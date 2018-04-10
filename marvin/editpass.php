<?php
session_start();
$con = mysqli_connect('localhost','root','','gym2');
$id = $_SESSION['mem_id'];
$acc = 'admin';
			if ($_SESSION['userSession'] == $acc) {
  		 	 header("Location: admin.php");
    		exit;
    	}
if (isset($_POST['update'])){
	
	$oldpassword = $_POST['oldpassword'];
	$npassword = $_POST['npassword'];
	$cpassword = $_POST['cpassword'];
	$password_validation = "/^[a-zA-Z0-9]+$/";


 if(!preg_match($password_validation, $npassword)){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Invalid Character Password</div>";
    } 
    else {

	$result = mysqli_query($con, "SELECT * FROM acount where acc_id = $id");
	$num_rows = mysqli_num_rows($result);
	if ($num_rows > 0){
		$row = mysqli_fetch_array($result);
		$cur_password = $row['password'];
	
		if ($oldpassword == $cur_password){
			if ($npassword == $cpassword){
				$result = mysqli_query($con, "UPDATE `acount` SET `password`='$npassword' WHERE acc_id = '$id'");
				echo "<script> alert('DONE EDITING')</script>";
				echo "<script>window.open('information.php','_self')</script>";
			

			}
			else{
				echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Wrong Confirm Password</div>";
			}
		}
		else {
			echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Wrong Old Password</div>";
		}
	}
	else {
		echo "ERROR";
	}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" /></head>
<body>
  
</header>   
 <a href="information.php" style="float: right; margin-right: 5px;"><button class="btn btn-warning"><span class="glyphicon glyphicon-log-out"></span>&nbspBack</button></a></b>
<div class="signin-form">

	<div class="container">
       <form class="form-signin" method="POST" action="#">
    
        <h2 class="form-signin-heading">Change Password</h2><hr />

    	<input type="hidden" name="id" value="<?php echo $_GET['acc_id'];?>">
    	 <div class="form-group">
        <input type="password" class="form-control" placeholder="Old Password" name="oldpassword" required />
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="New Password" name="npassword" required />
        </div>

        <div class="form-group">
        <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required />
        </div>

     	<hr />
        
        <div class="form-group">
            <button type="submit"  name="update" value="update">
    		<span class="glyphicon glyphicon-check"></span> &nbsp; Submit
			</button> 
        </div>  
        
      </form>

    </div>
    
</div>
</body>
</html>