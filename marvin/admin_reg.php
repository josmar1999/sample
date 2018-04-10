<?php
$con = mysqli_connect('localhost','root','','gym2');
session_start();
if(isset($_POST['submit'])){
    $name = $_POST['firstname'];
    $name1 = $_POST['middlename'];
    $name2 = $_POST['lastname'];
    $gender = $_POST['gender'];
    $payment = $_POST['payment'];
    $program = $_POST['program'];
    $cp_no = $_POST['cellphone'];
    $birthday = $_POST['birthday'];
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = $_POST['cpassword'];
    $member = 'member';
    $rem = 'None';

    $cp_validation = "/^[0-9]+$/";
    $name_validation = "/^[a-zA-Z]+$/";
    $name1_validation = "/^[a-zA-Z]+$/";
    $name2_validation = "/^[a-zA-Z]+$/";
    $username_validation = "/^[a-zA-Z0-9]+$/";
    $password_validation = "/^[a-zA-Z0-9]+$/";
    $cpassword_validation = "/^[a-zA-Z0-9]+$/";
    $weight_validation = "/^[0-9.]+$/";
    $height_validation = "/^[0-9.']+$/";

    date_default_timezone_set('Asia/Manila');
    $date = date('l jS \of F Y h:i:s A');

    $sql = "SELECT * FROM acount WHERE username = '{$username}'";
    $qry = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($qry);
    if($num_rows > 0){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>The username $username is already exist!</div>";
    }
    else if(!preg_match($cp_validation, $cp_no)){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Invalid Mobilenumber</div>";
    }
     else if(!preg_match($name_validation, $name)){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Invalid Firstname</div>";
    }
      
     else if(!preg_match($name1_validation, $name1)){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Invalid Middlename</div>";
    }
     else if(!preg_match($name2_validation, $name2)){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Invalid Lastname</div>";
    }
    
     else if(!preg_match($username_validation, $username)){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Invalid Username</div>";
    }
     else if(!preg_match($password_validation, $password)){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Invalid Password</div>";
    }
    else if(!(strlen($cp_no)==11)){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Mobilenumber atleast 11 digits!</div>";    
    }
    else if($password != $cpassword){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Confirmation password didnt matched to your password!</div>";
    }


    else{
        $sql = "INSERT INTO `acount`(`acc_id`, `acc_type`, `username`, `password`) VALUES (NULL,'$member','$username','$password')";
        $acc_qry = mysqli_query($con, $sql);
        $_SESSION['acc_id'] = mysqli_insert_id($con);
        $acc_id = $_SESSION['acc_id'];
        $sql = "INSERT INTO `members`(`mem_id`, `acc_id`, `firstname`, `middlename`, `lastname`,  `gender`, `payment`, `cellphone`, `birthday`, `remaining`) 
             VALUES (NULL,'$acc_id','$name','$name1','$name2','$gender','$payment','$cp_no','$birthday','$rem')";
            $mem_qry = mysqli_query($con, $sql);
            $_SESSION['mem_id'] = mysqli_insert_id($con);
            $mem_id = $_SESSION['mem_id'];
            $sql = "INSERT INTO `transac`(`transac_id`, `mem_id`, `date_reg`, `amount`, `date_paid`, `payment_stat`,`date_start`,`date_expire`,`program`) 
                    VALUES (NULL,'$mem_id','$date','$payment',' ','Pending',' ',' ','$program')";
            $trans_qry = mysqli_query($con, $sql);
            if($acc_qry && $mem_qry && $trans_qry ){
                echo "<div class='alert alert-success'><strong>Successfully registered!</strong>, Click here to <a href='admin_members.php'>login</a></div>";
            }
            else{
                echo "Error";
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
<a href="admin_members.php" style="float: right; margin-right: 5px;"><button class="btn btn-warning"><span class="glyphicon glyphicon-log-out"></span>&nbspBack</button></a></b>
<body>

<header>
  
</header>   
<div class="signin-form">
    <div class="container">
       <form class="form-signin" method="POST" action="#">
      
        <h2 class="form-signin-heading">Registration Form</h2><hr />
        
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Firstname" name="firstname" required />
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Middlename" name="middlename" required />
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Lastname" name="lastname" required />
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
                <select name="gender" class="form-control" id="gender" required />
                <option>-select-</option>
                <option value="Male"> Male</option>
                <option value="Female">Female</option>
                </select>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Mobile number" name="cellphone" required />
        </div><label>BIRTHDAY:</label>
        <div class="form-group">
            <input type="date" class="form-control" placeholder="Birthday" name="birthday" required />
        </div>
        <div><label>Program:</label>
            <select name="program" class="form-control" id="program" required>
                <option>-select-</option>
                <option value="Beginner">Beginner</option>
                <option value="Mediate">Mediate</option>
                <option value="Amateur">Amateur</option>
            </select>
        </div>
        <br>
        <div class="form-group">
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
        </div>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" required />
        <span id="check-e"></span>
        </div>
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required />
        </div>
        <hr />
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="submit" id="btn-login">
            <span class="glyphicon glyphicon-check"></span> &nbsp; Submit
            </button> 
        </div>  
        
      </form>

    </div>
    
</div>

</body>
</html>