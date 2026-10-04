<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej9.php" method="get">
        radio: <input type="num" name="radio"><br>
        altura: <input type="num" name="altura"><br>
        <input type="submit" name="Calcular VOlumen">
    </form>

    <?php
        $radio = $_GET["radio"];
        $altura = $_GET["altura"];

        $volumen = (1/3*pi()*($radio*pow($radio, 2)*$altura));

        echo "El volumen es: " . $volumen;
    ?>
</body>
</html>