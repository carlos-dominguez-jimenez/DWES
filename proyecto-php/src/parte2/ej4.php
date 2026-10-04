<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action = "ej4.php" method = "get">
        Num1: <input type="num" name="num1">
        Num2: <input type="num" name="num2">
        <input type="submit" value="Calcular">
    </form>

    <?php
        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];

        echo "Suma: " . $num1+$num2 . "<br>";
        echo "Resta: " . $num1-$num2 . "<br>";
        echo "Multiplicación: " . $num1*$num2 . "<br>";
        
        if ($num2 == 0) {
            echo "No se puede dividir por 0";
        } else {
            echo "División: " . $num1/$num2;
        }
    ?>
</body>
</html>