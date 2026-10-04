<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej6.php" method="get">
        base: <input type = "num" name="base">
        lado: <input type="num"   name="lado">
        <input type="submit"  value="Calcular Área">
    </form>

    <?php
        $base = $_GET["base"];
        $lado = $_GET["lado"];

        $area = ($base * $lado)/2;

        echo "El área del triángulo es: " . $area;
    ?>
</body>
</html>s