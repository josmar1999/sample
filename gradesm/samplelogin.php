<?PHP
	session_start();
	$con = mysqli_connect("localhost", "root", "","grademsys");
	if(isset($_POST['register'])){
		$name = $_POST['regusername'];
		$pass = $_POST['reguserpass'];
		$usertype = $_POST['usertype'];
		
		$salt = "db2";
		$cpass = crypt($pass,$salt);
		
		$result = mysqli_query($con, "INSERT INTO users VALUES (NULL, '{$name}', '{$cpass}', '{$usertype}')");
		
		if($result){
			header("Location: samplelogin.php");
		}else{
			echo mysqli_error($con);
		}
	}
	
	if(isset($_POST['login'])){
		$name = $_POST['username'];
		$pass = $_POST['userpass'];
		
		$salt = "db2";
		$cpass = crypt($pass,$salt);
		
		$result = mysqli_query($con, "SELECT * FROM users WHERE username = '{$name}' AND userpassword = '{$cpass}'");
		
		if($result){
			$cnt = mysqli_num_rows($result);
			if($cnt > 0){
				$row = mysqli_fetch_array($result);
				$type = $row[3];
				
				$_SESSION['isloggedin'] = true;
				$_SESSION['username'] = $name;
				$_SESSION['usertype'] = $type;
				
				if($type == "Administrator"){
					header("Location: index.php");
				}else{
					header("Location: user.php");
				}
			}else{
				echo "<script>alert('Invalid username/password');</script>";
			}
			
		}else{
			echo mysqli_error($con);
		}
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>



<div class="signin-form">

	<div class="container">

<form action = 'samplelogin.php' method = 'post'>
	<table align = 'center'>
		<div class="form-group">
        <input type="username" class="form-control" placeholder="Username" name="username" required />
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="userpass" required />
        </div>
		 <div class="form-group">
            <input type="submit" class="btn btn-default" name="login" id="btn-login" value = "LOGIN">
			</button> 
			<a href="register.php" class="btn btn-default" style="float:right;">Sign UP Here</a>
			</div>
	</table>
	<br>
	<br>
	<center><h2>Register</h2></center>
	<table align = 'center'>
		<tr>
			<td>Username</td>
			<td><input type = 'text' name = 'regusername'></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type = 'password' name = 'reguserpass'></td>
		</tr>
		<tr>
			<td>Usertype</td>
			<td>
				<select name = 'usertype'>
					<option></option>
					<option>Administrator</option>
					<option>User</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan = 2><input type = 'submit' name = 'register' value = 'Login'></td>
		</tr>
	</table>
</form>