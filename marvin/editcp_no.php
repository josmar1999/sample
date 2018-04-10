<?php
session_start();
$con = mysqli_connect('localhost','root','','gym2');    
$acc = 'admin';
            if ($_SESSION['userSession'] == $acc) {
             header("Location: admin.php");
            exit;  
        }

$id = $_GET['id'];
if (isset($_POST['update'])){  
    $ncellphone = $_POST['ncellphone'];
    $cp_validation = "/^[0-9]+$/";
    

    if(!preg_match($cp_validation, $ncellphone)){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Invalid Mobilenumber</div>";
    }
    else if(!(strlen($ncellphone)==11)){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Mobilenumber atleast 11 digits!</div>";
    }
    else{

$result = mysqli_query($con, "UPDATE `members` SET `cellphone`='$ncellphone' WHERE mem_id = '$id'");
    if($result == true){
        echo "<script>alert('DONE EDITING')</script>";
        echo "<script>window.open('information.php','_self')</script>";
    }
    else{
        echo "error";
    }
}
}
?>

<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
    <a href="information.php" style="float: right; margin-right: 5px;"><button class="btn btn-warning"><span class="glyphicon glyphicon-log-out"></span>&nbspBack</button></a></b>
<header>

</header>   
<div class="signin-form">
	<div class="container">
       <form class="form-signin" method="POST" action="#">
      
        <h2 class="form-signin-heading">Registration Form</h2><hr />
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Mobile number" name="ncellphone" required />
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