<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <?php
        function mostrarDigito($numero, $pos) {
            return $numero[$pos];
        }
    ?>

    <form action="ej2.2.php" method="get">
        Número: <input type="number" name="numero">
        Posición: <input type="number" name="posicion">
        <input type="submit" value="Mostrar">
    </form>

    <?php
        if (isset($_GET["numero"], $_GET["posicion"])) {
            $num = $_GET["numero"];
            $pos = $_GET["posicion"];

            echo "en la posicion $pos está el número: " . mostrarDigito($num, $pos);
        }
    ?>
</body>
</html>