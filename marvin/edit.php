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

if(isset($_POST['update']))
{    
    $id = $_GET['id'];
	$id = $_POST['id'];    
	$name = $_POST['firstname'];
	$name1 = $_POST['middlename'];
	$name2 = $_POST['lastname'];
    $gender = $_POST['gender'];
    $cp_no = $_POST['cellphone'];
    $birthday = $_POST['birthday'];

    $cp_validation = "/^[0-9]+$/";
    $name_validation = "/^[a-zA-Z ]+$/";
    $name1_validation = "/^[a-zA-Z ]+$/";
    $name2_validation = "/^[a-zA-Z ]+$/";
	
    if(!preg_match($cp_validation, $cp_no)){
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
    else if(!(strlen($cp_no)==11)){
        echo "<div class='alert alert-danger'><a href='register.php' data-dismiss='alert' class='close' aria-label='close'>&times</a>Mobilenumber atleast 11 digits!</div>";
    }
     
    else{

        $result = mysqli_query($con, "UPDATE members SET firstname='$name',middlename='$name1',lastname='$name2',gender='$gender',cellphone ='$cp_no',birthday='$birthday' WHERE mem_id=$id");   
      
    	 if ($result)
         {
              header("Location: admin_members.php");
         }
     }

} 

$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM members WHERE mem_id = $id");

while($res = mysqli_fetch_array($result))
{
    $name = $res[2];
	$name1 = $res[3];
	$name2 = $res[4];
    $gender = $res[5];
	$cp_no = $res[7];
	$birthday = $res[8];
   
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
<header>
    <a href="admin_members.php">&nbsp<span style="float:right; margin-right: 5px; margin-top: 15px; font-size: 15px;">&nbspBack</span><span class="glyphicon glyphicon-log-in" 
    style="float: right; margin-top: 10px; font-size: 20px;"></span></a>
</header>   
<div class="signin-form">
	<div class="container">
       <form class="form-signin" method="POST" action="#">
      
        <h2 class="form-signin-heading">EDIT</h2></hr>
        
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">

        <div class="form-group">
            <input type="text" class="form-control"  name="firstname" value="<?php echo $name?>" required />
        </div>
        <div classe="form-group">
            <input type="text" class="form-control"  name="middlename" value="<?php echo $name1?>" required />
        </div>
        <br>
        <div class="form-group">
            <input type="text" class="form-control"  name="lastname" value="<?php echo $name2?>" required />
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
                <select name="gender" class="form-control" id="gender" required />
                <option><?php echo $gender?></option>
                <option value="Male"> Male</option>
                <option value="Female">Female</option>
                </select>
        </div>
        <div class="form-group"><label>Cellphone Number</label>
            <input type="text" class="form-control" placeholder="Mobile number" name="cellphone" value="<?php echo $cp_no?>" required />
        </div>
        <div class="form-group"><label>Birthday</label>
            <input type="date" class="form-control" placeholder="Birthday" name="birthday" value="<?php echo $birthday?>" required />
        </div>	
        <div class="form-group">
     	<hr />
        
        <div class="form-group">
            <button type="Submit" class="btn btn-default" name="update" id="btn-login">
    		<span class="glyphicon glyphicon-check"></span> &nbsp; Submit
			</button> 
        </div>  
        
      </form>

    </div>
    
</div>

</body>
</html>