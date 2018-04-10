<?php
$con = mysqli_connect('localhost','root','','gym2');
if (isset($_SESSION['userSession']) == 'member') {
	header("Location: index.php");
	exit;
}
$id = $_GET['id'];

$result = mysqli_query($con, "DELETE FROM transac WHERE transac_id = $id");

if($result == true){
	echo "<script>alert('Successfully deleted')</script>";
	echo "<script>window.open('admin_transaction.php','_self')</script>";
}
else{
	echo "Error! cant deleted";
}	
?>