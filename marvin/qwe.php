$sql = mysqli_query($con,"CALL checkdate('$reservation_date')");
										    		$num_rows = mysqli_num_rows($sql);
													if($num_rows >0)
													{
										    			while($row = mysqli_fetch_array($sql))
										    			{
										    				$row[0]=$ven;
										    				$row[1]=$stat;
										    			}	
										    			if($stat=='No')
										    			{
										    				echo "Select Venue:";
										    				echo " <select name='venue'>";
															$num = $_SESSION['nh'];
															$sql = mysqli_query($mysqli, "CALL checkvenue('$num',$ven')");
															$num_rows = mysqli_num_rows($sql);
															if($num_rows >0)
															{	
																while($row = mysqli_fetch_array($sql))
																{
																	echo "<option value=".$row[0].">".$row[1]." (Max Capacity:".$row[2].")</option>";
																}
															}
														}
														else
														{
															 echo "<script>alert('No available venue in this date that can accommodate '$num' person ')</script>";
        														echo "<script>window.open('addtransactsecond.php','_self')</script>";
														}
										    		}