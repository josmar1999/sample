<html>
<head>
    <h2>Checker Function</h2>
</head>
<body>
<form action="#" method="POST">
    <input type="text" name="brac">
    <br><br><input type="submit" name="submit">

</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $string = $_POST['brac'];

if (substr_count($string, '{') !== substr_count($string, '}'))
{
    echo $string;
   echo "INVALID";      
}
else{
    echo $string;
    echo "VALID";
}
}