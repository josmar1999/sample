<html>
<head>
    <h2>String Reverse</h2>
</head>
<body>
    <form action="#" method="POST">

    <input type="text" name="name">
    <br><br><input type="submit" name="submit" id="submit">
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])){
    $input = $_POST['name'];

   
    echo strrev($input);
}

?>