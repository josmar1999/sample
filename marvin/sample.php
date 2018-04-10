<?php
	$datepaid = date('Y-m-d');
	
	echo $datepaid . " " .date('Y-m-d', strtotime($datepaid. ' + 30 days'));
?>