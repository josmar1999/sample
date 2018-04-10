<?php
$con = mysqli_connect('localhost','root','','gym2');

$id = $_GET['id'];

$result = mysqli_query($con, "DELETE FROM members WHERE mem_id = $id");
$result = mysqli_query($con, "DELETE FROM transac WHERE mem_id = $id");


if($result == true){
	echo "<script>alert('Successfully deleted')</script>";
	echo "<script>window.open('admin_members.php','_self')</script>";
}
else{
	echo "Error! cant deleted";
}	
?>