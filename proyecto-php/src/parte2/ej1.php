<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    
<form action="ej1.php" method="get">
    Número 1: <input type="num" name="num1"><br>
    Número 2: <input type="num" name="num2"><br>
    <input type="submit" value="Multiplicar">
    
</form>

<?php
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];

    $resultado = $num1 * $num2;

    echo "$num1 x $num2 = $resultado";
?>
</body>
</html>