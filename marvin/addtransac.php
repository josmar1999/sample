    <?php

session_start();
$con = mysqli_connect("localhost","root","","gym2");
if(isset($_SESSION['userSession']) == ""){
         header("Location: index.php");
            exit;
    }
$acc = 'admin';
            if ($_SESSION['userSession'] == $acc) {
             header("Location: admin.php");
            exit;
        }
$id = $_SESSION['mem_id'];
$sql = "SELECT * FROM members WHERE acc_id = $id";
$qry = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($qry);
$row = mysqli_fetch_array($qry);
$mem_id = $row['mem_id'];


    if (isset($_POST['Submit'])){   

    $program = $_POST['program'];
    $payment = $_POST['payment'];
    date_default_timezone_set('Asia/Manila');
    $date = date('l jS \of F Y h:i:s A');
    
     $result = mysqli_query($con, "INSERT INTO `transac`(`transac_id`, `mem_id`, `date_reg`, `amount`, `date_paid`, `payment_stat`, `date_start`, `date_expire`,`program`) 
        VALUES (NULL,'$mem_id','$date','$payment','','Pending','','','$program')");
    if ($result == true){
        header("Location:transaction.php");

    }else
    {
        mysql_error($con);
    }

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
<title>ADD TRANS</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="mystyle.css" type="text/css" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
		
<body>
	<a href="transaction.php" style="float: right; margin-right: 5px;"><button class="btn btn-warning"><span class="glyphicon glyphicon-log-out"></span>&nbspBack</button></a></b>
	<div class="signin-form">
	<div class="container">
	<form action="#" method="post" name="form1" class="form-signin">
		
	<div class="form-group">
        <h1>Add transaction</h1>
        <table class='table table-striped' border="1" style="margin-top: 30px;">
            <thead>
        <label for="payment">Payment:</label>
        <select name="payment" class="form-control" id="payment" required />
        	<option>-select-</option>
        	<option value="1 Month (500)">For 1 Month (500)</option>
            <option value="2 Months (1000)">For 2 Months (1000)</option>
            <option value="3 Months (1500)">For 3 Months (1500)</option>
            <option value="4 Months (2000)">For 4 Months (2000)</option>
            <option value="5 Months (2500)">For 5 Months (2500)</option>
            <option value="6 Months (3000)">For 6 Months (3000)</option>
            <option value="7 Months (3500)">For 7 Months (3500)</option>
            <option value="8 Months (4000)">For 8 Months (4000)</option>
            <option value="9 Months (4500)">For 9 Months (4500)</option>
            <option value="10 Months (5000)">For 10 Months (5000)</option>
            <option value="11 Months (5500)">For 11 Months (5500)</option>
            <option value="12 Months (6000)">For 12 Months (6000)</option>
        </select>
        <br>
              <div><label>Program</label>
            <select name="program" class="form-control" id="program" required>
                <option>-select-</option>
                <option value="Beginner">Beginner</option>
                <option value="Mediate">Mediate</option>
                <option value="Amateur">Amateur</option>
            </select>
        </div>
        </thead>
        </table>
        </div>

     	<hr />
        <input type="submit" value="add" name="Submit">
		<input type="reset" value="Reset ">

			</div>
				</form>
			</div>
		</div>
		
		
</body>
</html>