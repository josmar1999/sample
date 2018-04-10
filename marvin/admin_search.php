		<?php
session_start();
if(isset($_SESSION['userSession']) == ""){
		 header("Location: index.php");
    		exit;
	}

	$acc = 'member';
			if ($_SESSION['userSession'] == $acc){
  		 	 header("Location: memberpage.php");
    		exit;
			}
	?>
<?php
	$con = mysqli_connect("localhost", "root", "", "gym2");
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
	<form action="#" method="POST">
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
	<center style="margin-top: 20px;">
	</center>
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table class='table table-striped' border="1" style="margin-top: 30px;">
			<thead>
				<tr>
					<th><span class="glyphicon glyphicon-cog"></span>&nbspMembership ID</th>
					<th><span class="glyphicon glyphicon-cog"></span>&nbspAccount ID</th>
					<th><span class="glyphicon glyphicon-user"></span>&nbspFirstname</th>
					<th><span class="glyphicon glyphicon-user"></span>&nbspMiddlename</th>
					<th><span class="glyphicon glyphicon-user"></span>&nbspLastname</th>
					<th>Gender</th>
					<th>Payment</th>
					<th><span class="glyphicon glyphicon-phone"></span>&nbspCellphone number</th>
					<th><span class="glyphicon glyphicon-calendar"></span>&nbspBirthdate</th>
					<th><span class="glyphicon glyphicon-calendar"></span>&nbspRemaining Days</th>	
					
				</tr>
			</thead>
			<?php
				$query = "";
				if(isset($_POST['searchname']))
				{	
					$searchname = $_POST['searchname'];
					$sql = "SELECT * FROM members where firstname = '$searchname'";
					$qry = mysqli_query($con, $sql);
					$num_rows = mysqli_num_rows($qry);
					$row = mysqli_fetch_array($qry);
					$fname = $row['firstname'];
				
				
					$query = "CALL searchname ('{$searchname}')";
					
					if($_POST['searchname'] == ""){
						echo "<script> alert('INPUT DATA')</script>";
					}
					elseif ($fname != $searchname) {
						echo "<script> alert('NO MATCH')</script>";
					}

				}
				else
				{	
					$query = "CALL getname()";
				}



				$sql = mysqli_query($con, $query) or die("Error:".mysqli_error());
				$num_rows = mysqli_num_rows($sql);
				while($row = mysqli_fetch_array($sql)){
					
							echo "<tr>";
							echo "<td>".$row[0]."</td>";
							echo "<td>".$row[1]."</td>";
							echo "<td>".$row[2]."</td>";
							echo "<td>".$row[3]."</td>";
							echo "<td>".$row[4]."</td>";
							echo "<td>".$row[5]."</td>";
							echo "<td>".$row[6]."</td>";
							echo "<td>".$row[7]."</td>";
							echo "<td>".$row[8]."</td>";
							echo "<td>".$row[9]."</td>";
						

						}
			
						?>
					</table>
					<br>
					
							
						</tr>
						<input type="text" name="searchname" placeholder="Firstname" size="15">
						<input type="submit" name="Search" value="Search">
						</tr>
						</form>

</div>
</body>	
</html>