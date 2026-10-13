<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <?php
        function mostrarNumero($numero, $posicion) {
            return $numero[$posicion];
        }
    ?>
    <form action="ej2.1.php" method="get">
        Inserte el número: <input type="number" name="numero">
        Posición: <input type="number" name="posicion">
        <input type="submit" value="Mostrar">
    </form>

    <?php
        if (isset ($_GET["numero"], $_GET["posicion"])) {
            $num = $_GET["numero"];
            $pos = $_GET["posicion"];

            echo mostrarNumero($num, $pos);
        }
    ?>
</body>
</html>