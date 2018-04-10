<?php
session_start();
$con = mysqli_connect('localhost','root','','gym2');

if (isset($_SESSION['userSession'])!="") {
	header("Location: index.php");
	exit;
}

if (isset($_POST['btn-login'])) {
			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');
			$nowdate = $date;
	
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$sql = "SELECT * FROM acount WHERE username = '{$username}' and password = '{$password}'";
	$qry = mysqli_query($con, $sql);
	$num_rows = mysqli_num_rows($qry);
	if($num_rows >0){
		$row = mysqli_fetch_array($qry);
		 	if($row['acc_type'] == 'admin'){
			$_SESSION['admin_id'] = $row['acc_id'];
			$_SESSION['userSession'] = 'admin';
			header('location:admin.php');
		}
		else if ($row['acc_type'] == "member"){
			$_SESSION['mem_id'] = $row['acc_id'];
			$_SESSION['userSession'] = 'member';
			$acc_id = $_SESSION['mem_id'];
                $sql = "SELECT 	members.mem_id AS mem_id,
                				members.remaining AS rem,
                               	transac.date_reg AS date_reg,
                               transac.amount AS amount,
                               transac.date_paid AS date_paid,
                               transac.date_start AS date_start,
                               transac.date_expire AS date_expire,
                               transac.payment_stat AS payment_stat
                               FROM members INNER JOIN transac ON transac.mem_id = members.mem_id 
                               WHERE members.acc_id = '{$acc_id}'";
								$qry = mysqli_query($con, $sql);
								$num_rows = mysqli_num_rows($qry);
								while($row = mysqli_fetch_array($qry)){
								$mem_id = $row['mem_id'];
								$_SESSION['date_start'] = $row['date_start'];
								$_SESSION['date_expire'] = $row['date_expire'];
								}
				if($_SESSION['date_expire'] == '0000-00-00'){
				}else{
				$date1=  new DateTime($nowdate);
				$date2=  new DateTime($_SESSION['date_expire']);
				$diff=date_diff($date1,$date2); 
				$rem = $diff->format("%a days");
				$sql = "UPDATE members SET remaining = '$rem' where mem_id = '$mem_id'";
				$qry = mysqli_query($con,$sql) or die(mysqli_error());
				echo 'DATE NOW IS:'.' '.$nowdate; echo "<br>";
				}
			header('location:memberpage.php');
		}
	}
	else
	{
		echo "<script> alert('Invalid Marven!'); </script>";
	}
	
}
?>



<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>	
<a href="mainpage.php" style="float: right; margin-right: 5px;"><button class="btn btn-warning"><span class="glyphicon glyphicon-log-out"></span>&nbspHOME</button></a></b>	
<div class="signin-form">

	<div class="container">
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Sign In.</h2><hr />
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
        <input type="text" class="form-control"  placeholder="Username" name="username" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <a href="register.php"><button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span>&nbsp; Sign In
			</button></a>
            
            <a href="register.php" class="btn btn-default" style="float:right;"><span class="glyphicon glyphicon-user"></span>&nbsp;Register</a>
            
        </div>  
        
        
      
      </form>

    </div>
    
</div>

</body>
</html>