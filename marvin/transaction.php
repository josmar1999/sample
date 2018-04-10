<?php
session_start();
$con = mysqli_connect('localhost','root','','gym2');
if(isset($_SESSION['userSession']) == ""){
		 header("Location: index.php");
    		exit;
	}
$acc = 'admin';
			if ($_SESSION['userSession'] == $acc) {
  		 	 header("Location: admin.php");
    		exit;
    	}
$result = mysqli_query($con, "SELECT * FROM members Where username = username ORDER BY id ASC"); 

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="table.css"style type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Membership</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="mystyle.css" type="text/css" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<table border = 1>
<br>

<br></br>

<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
		
		
			<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="memberpage.php">Membership System</a>
			</div>
							
							
			<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li ><a href="information.php">Information</a></li>
						<li><a href="transaction.php">Transaction</a></li>

						</ul>	 
					<ul class="nav navbar-nav navbar-right">
					<li><a href="logoutuser.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
				 </ul>
			</div>
							
		</div>
	</nav>		
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table class='table table-striped' border="1" style="margin-top: 20px;">
			<thead>
				
				<tr>
					<input type="hidden" name="id" value="<?php echo $_GET['mem_id'];?>">
					<th><center><span class="glyphicon glyphicon-asterisk"></span>&nbspID</th></center>
					<th><center><span class="glyphicon glyphicon-calendar"></span>&nbspDate registered</th></center>
					<th><center>Amount</th></center>
                    <th><center><span class="glyphicon glyphicon-calendar"></span>&nbspDate paid</th></center>
                    <th><center><span class="glyphicon glyphicon-asterisk"></span>&nbspPayment status</th></center>
                    <th><center><span class="glyphicon glyphicon-calendar"></span>&nbspDate started</th></center>
                    <th><center><span class="glyphicon glyphicon-calendar"></span>&nbspDate expire</th>	</center>
                    <th><center><span class="glyphicon glyphicon-calendar"></span>&nbspRemaining Days</th></center>
                    <th><center><span class="glyphicon glyphicon-asterisk"></span>&nbspProgram</th></center>
				</tr>
			</thead>
			<?php

			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');
    		$nowdate = $date;
			
				$acc_id = $_SESSION['mem_id'];
                $sql = "SELECT 	members.mem_id AS mem_id,
                				members.remaining AS rem,
                               transac.date_reg AS date_reg,
                               transac.amount AS amount,
                               transac.date_paid AS date_paid,
                               transac.date_start AS date_start,
                               transac.date_expire AS date_expire,
                               transac.payment_stat AS payment_stat,
                               transac.program AS program
                               FROM members INNER JOIN transac ON transac.mem_id = members.mem_id 
                               WHERE members.acc_id = '{$acc_id}'";
				$qry = mysqli_query($con, $sql);
				$num_rows = mysqli_num_rows($qry);
				if($num_rows > 0 ){
					while($row = mysqli_fetch_array($qry)){ ?>	
						<tr>
							<td><?php echo $row['mem_id']; $mem_id = $row['mem_id'];?></td>
							<td><?php echo $row['date_reg'] ?></td>
							<td><?php echo $row['amount'] ?></td>
							<td><?php echo $row['date_paid'] ?></td>
							<td><?php echo $row['payment_stat'] ?></td>
							<td><?php echo $row['date_start']; $_SESSION['date_start'] = $row['date_start'];?></td>
							<td><?php echo $row['date_expire']; $_SESSION['date_expire'] = $row['date_expire'];?></td>
							<td><?php echo $row['rem']; $rem = $row['rem'];?></td>
							<td><?php echo $row['program']?></td>
						</tr>

				<?php	} 
					if ($rem == '3 days'){
							echo "<script> alert ('Your membership is about to expire in 3 days') </script>";
					}
					

				$sql = "SELECT *  FROM transac where date_expire = '$nowdate'";
				$qry = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($qry);
				$num_rows = mysqli_num_rows($qry);
				if($num_rows > 0){
					echo "<script> alert ('Your membership is about to expire for the date of $row[7]') </script>";
				}
				
				?>
				<center><a href="addtransac.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-cog" name ="addtransac"></span>&nbspADD TRANS</button></a></center>
				<?php 
				} 
				 
				?>
		</table>
	</div>
</body>
</html>