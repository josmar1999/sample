<html>
<h2>Calculate Date & Time Differences</h2>
</html>
<?php
$start  = date_create('2017-01-04 17:36:43');
$end 	= date_create('2017-05-21 10:12:56'); 
$diff  	= date_diff( $start, $end );

echo 'The difference is ';
echo  $diff->y . ' years, ';
echo  $diff->m . ' months, ';
echo  $diff->d . ' days, ';
echo  $diff->h . ' hours, ';
echo  $diff->i . ' minutes, ';
echo  $diff->s . ' seconds';


echo '<br>The difference in days : ' . $diff->days;
