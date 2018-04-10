<html>
<head>
    <h3>Calculate Volume of Sphere</h3>
</head>
<body>

        <form action="#" method="POST">
    <input type="text" name="rad" placeholder="Radius">
    <br><br><input type="submit" name="submit" id="submit">

    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])){
$rad = $_POST['rad'];
$f = 4/3;
$pi = 3.14;
$r = pow($rad,3);

$tot = $f * $pi;
$al = $tot * $r;
$ro = round($al,1);
echo $ro;
}

?>