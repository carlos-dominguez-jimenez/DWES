<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <?php
        function mostrarPosicion ($numConvertido, int $posExacta) {
            return $numConvertido[$posExacta];
        }
    ?>
    <form action="ej2.php" method="get">
        Introduce el número entero: <input type="number" name="numero">
        ¿Que posición quieres mostrar? <input type="number" name="posicion">
        <input type="submit" value="Mostrar">
    </form>
    <?php
        if (isset($_GET["numero"], $_GET["posicion"])) {
            $num = $_GET["numero"];
            $pos = $_GET["posicion"];

            echo mostrarPosicion($num, $pos);
        }
    ?>
</body>
</html>