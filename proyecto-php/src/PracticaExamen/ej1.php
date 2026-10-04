<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej1.php" method="get">
        Altura: <input type="num" name="altura"><br>
        Diametro: <input type="num" name="diametro"><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        $altura = $_GET["altura"];
        $diametro = $_GET["diametro"];

        $volumen = pi() * $diametro * $altura;

        echo "El volumen es: " . $volumen;
    ?>
</body>
</html>