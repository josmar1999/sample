<?php
$start_date = new DateTime('2017-05-21 10:12:56');
$since_start = $start_date->diff(new DateTime('2017-01-04 17:36:43'));

echo $since_start->d.' days<br>';
echo $since_start->h.' hours<br>';
echo $since_start->i.' minutes<br>';
echo $since_start->s.' seconds<br>';
	?>

