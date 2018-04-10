<?php
session_start();
$con = mysqli_connect('localhost','root','','gym2');
if(isset($_SESSION['userSession']) == ""){
		 header("Location: index.php");
    		exit;
	}
$acc = 'member';
			if ($_SESSION['userSession'] == $acc) {
  		 	 header("Location: memberpage.php");
    		exit;
			}
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
<a href="logoutuser.php" style="float: left; margin-right: 5px;"><button><span class="glyphicon glyphicon-log-out"></span>&nbspLogout</a></button>
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
					<a class="navbar-brand" href="admin.php">Membership System</a>
			</div>
							
							
			<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li ><a href="admin_members.php">View Members</a></li>
						<li><a href="admin_transaction.php">View Transaction</a></li>
						<li ><a href="report.php">View Report</a></li>
						<li><a href="admin_search.php">Search</a></li>
						</ul>	 
					<ul class="nav navbar-nav navbar-right">
					<li><a href="logoutuser.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
				 </ul>
			</div>
							
		</div>
	</nav>		
	<br>
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table class='table table-striped' border="1" style="margin-top: 30px;">
			<thead>
				<tr>
					<input type="hidden" name="id" value="<?php echo $_GET['mem_id'];?>">
					<th><span class="glyphicon glyphicon-asterisk"></span>&nbspID</th>
					<th><span class="glyphicon glyphicon-calendar"></span>&nbspDate registered</th>
					<th>Amount</th>
                    <th><span class="glyphicon glyphicon-calendar"></span>&nbspDate paid</th>
                    <th><span class="glyphicon glyphicon-asterisk"></span>&nbspPayment status</th>
                    <th><span class="glyphicon glyphicon-calendar"></span>&nbspDate started</th>
                    <th><span class="glyphicon glyphicon-calendar"></span>&nbspDate expire</th>	
				</tr>
			</thead>
			<?php
			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');
    		$nowdate = $date;
			echo "<b>DATE NOW IS:</b>".' '.$nowdate;
				$sql = "SELECT * FROM transac where date_expire = '$nowdate'";
				$qry = mysqli_query($con,$sql);
				$num_rows = mysqli_num_rows($qry);
				if($num_rows > 0){
					while($row = mysqli_fetch_array($qry)){ ?>	
						<tr>
							<td><?php echo $row[0]?></td>
							<td><?php echo $row[2]?></td>
							<td><?php echo $row[3]?></td>
							<td><?php echo $row[4]?></td>
							<td><?php echo $row[5]?></td>
							<td><?php echo $row[6]?></td>
							<td><?php echo $row[7]?></td>
						</tr>
				<?php	
				} 
				}
				else{
				echo "<br>"; echo "<b style='color: red;'>There is no reports right now</b>";
				}
				?>
		</table>
	</div>
</body>
</html>