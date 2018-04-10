<html>
	<td><input type="text" name="t1"></td><br><br>
    <td><input type="text" name="t2"></td>
</html>


<?php
$a = gmp_init("0x41682179fbf5");
$res = gmp_div_qr($a, "0xDEFE75");
printf("Result is: q - %s, r - %s",
       gmp_strval($res[0]), gmp_strval($res[1]));
?>