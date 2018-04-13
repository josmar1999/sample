<html>
    <head></head>
    <body>
    
            <br>
            <form action = '#' method = 'post'>
                Input Temperature in Celsius <input type = "text" name = 'tempe' placeholder = 'Celsius'>
                <br>
             lo9
                <input type = 'submit' name = 'submit' value = 'Submit'><br>
            </form>
    </body>
</html>

<?php
    if(isset($_POST['submit'])){
        $tempe = $_POST['tempe'];
        
        
        $add = 273.15;
        $total =0;
        
        $total = $tempe + $add;
        
        echo "Celsius: $tempe";
        echo"<br>";
        echo "Kelvin: $total";
        echo"<br>";
        
    }
?>

