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
$id = $_GET['id'];

 date_default_timezone_set('Asia/Manila');
      $date = date('Y-m-d');
        $nowdate = $date;

$sql = "SELECT * FROM members WHERE mem_id = $id";
	$qry = mysqli_query($con, $sql);
	$num_rows = mysqli_num_rows($qry);
	$row = mysqli_fetch_array($qry);
	$fname = $row['firstname'];
	$mname = $row['middlename'];
	$lname = $row['lastname'];


$sql = "SELECT * FROM transac WHERE mem_id  = $id";
    $qry = mysqli_query($con,$sql);
    $num_rows = mysqli_num_rows($qry);
    $row = mysqli_fetch_array($qry);
    $date_paid = $row['date_paid'];
    $payment = $row['payment_stat'];
    $date_start = $row['date_start'];
    $date_expire = $row['date_expire'];
    $program = $row['program'];


if(isset($_POST['update'])){
	   $date_paid = $_POST['date_paid'];
	   $payment = $_POST['payment'];
     $program = $_POST['program'];
     $date_expire = date('Y-m-d', strtotime($date_paid. ' + 30 days'));

	$result = mysqli_query($con, "UPDATE `transac` SET `date_paid`='$date_paid', `payment_stat`='$payment', `date_start`= '$date_paid' ,
    `date_expire`= '$date_expire', `program` = '$program' WHERE mem_id = $id ");
	
	if ($result == true) 
	{
     $sql = "SELECT * FROM transac where mem_id = $id";
      $qry = mysqli_query($con, $sql);
      $num_rows = mysqli_num_rows($qry);
       if($num_rows > 0){
        $row = mysqli_fetch_array($qry);
        $date_expire = $row[7];
        echo $date_expire;
        $date1=  new DateTime($nowdate);
        $date2=  new DateTime($date_expire);
        $diff=date_diff($date1,$date2); 
        $rem = $diff->format("%a days");
        echo  $rem;
        if ($sql){
        $sql = "INSERT INTO `members`(`mem_id`, `acc_id`, `firstname`, `middlename`, `lastname`, `weight`, `height`, `gender`, `payment`, `cellphone`, `birthday`, `remaining`)
        VALUES (NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'$rem'])";
		    echo "<script>alert('DONE EDITING')</script>";
        echo "<script>window.open('admin_transaction.php','_self')</script>";
      }
        }
	}else
	{
		echo "ERROR";
	}

}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payments</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
   <a href="admin_transaction.php">&nbsp<span style="float:right; margin-right: 5px; margin-top: 15px; font-size: 15px;">&nbspBack</span><span class="glyphicon glyphicon-log-in" 
    style="float: right; margin-top: 10px; font-size: 20px;"></span></a>
<div class="signin-form">

	<div class="container">

       <form class="form-signin" method="POST" action="#">
           <h2 class="form-signin-heading">Payments Form</h2><hr />
       	<label>Firstname: </label><?php echo $fname?>
        <br><label>Middlename: </label><?php echo $mname?></br>
        <label>Lastname: </label><?php echo $lname?>
      <br></br>
     
        <label>Date Paid</label>
         <div class="form-group">
          <input type=" " name="date_paid"  value="<?php echo $nowdate?>">               
        </div>
           <div class="form-group">
              <label for="program">Program:</label>
            <select name="program" class="form-control" id="program" required>
                <option><?php echo $program?></option>
                <option value="Beginner">Beginner</option>
                <option value="Mediate">Mediate</option>
                <option value="Amateur">Amateur</option>
            </select>
          </div>
          <div class="form-group">
        <label for="payment">Payment:</label>
        <select name="payment" class="form-control" id="payment" required />
        	<option><?php echo $payment?></option>
        	<option value="Paid">Paid</option>
          <option value="Pending">Pending</option>
        </select>
        </div>



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