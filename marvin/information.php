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
		<table class='table table-striped' border="1" style="margin-top: 30px;">
			<thead>
				<tr>
					<center><th><span class="glyphicon glyphicon-cog"></span>&nbspMember ID</th></center>
					<center><th><span class="glyphicon glyphicon-cog"></span>&nbspAccount ID</th></center>
					<center><th><span class="glyphicon glyphicon-user"></span>&nbspFirstname</th></center>
					<center><th><span class="glyphicon glyphicon-user"></span>&nbspMiddlename</th></center>
					<center><th><span class="glyphicon glyphicon-user"></span>&nbspLastname</th></center>
					<center><th>Gender</th>	</center>
					<center><th>Payment</th></center>
					<center><th><span class="glyphicon glyphicon-phone"></span>&nbspCellphone number</th></center>
					<center><th><span class="glyphicon glyphicon-calendar"></span>&nbspBirthdate</th></center>
				</tr>
			</thead>	
			<?php
				$acc_id = $_SESSION['mem_id'];
				$sql = "SELECT * FROM members WHERE acc_id = '$acc_id'";
				$qry = mysqli_query($con, $sql);
				$num_rows = mysqli_num_rows($qry);
				if($num_rows > 0 ){
					while($row = mysqli_fetch_array($qry)){ ?>	
						<tr>
							<td><?php echo $row[0] ?></td>
							<td><?php echo $row[1] ?></td>
							<td><?php echo $row[2] ?></td>
							<td><?php echo $row[3] ?></td>
							<td><?php echo $row[4] ?></td>
							<td><?php echo $row[5] ?></td>
							<td><?php echo $row[6] ?></td>
							<td><?php echo $row[7] ?></td>			
							<td><?php echo $row[8] ?></td>
							

						</tr>
						<center><a href="editpass.php?id=<?php echo $row[1]?>"><button class="btn btn-warning"><span class="glyphicon glyphicon-cog"></span>&nbspChange Password</button></a>
						<a href="editcp_no.php?id=<?php echo $row[0]?>"><button class="btn btn-warning"><span class="glyphicon glyphicon-cog"></span>&nbspChange Phone Number</button></a></center>
				<?php	}
				} 
				?>
		</table>
	</div>
</body>
</html>