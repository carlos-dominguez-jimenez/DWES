<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <?php
        function mostrarIntervalo($numero, $posicion1, $posicion2) {
            $resultado = "";

            for ($i = $posicion1; $i <= $posicion2; $i++) {
                $resultado = $resultado . $numero[$i];
            }
            return $resultado;
        }
    ?>
    <form action="ej3.1.php" method="get">
        Número: <input type="number" name="numero">
        Posición 1: <input type="number" name="Posicion1">
        Posición 2: <input type="number" name="Posicion2">
        <input type="submit" value="Mostrar">
    </form>
    <?php
        if (isset($_GET["numero"], $_GET["Posicion1"], $_GET["Posicion2"])) {
            $num = $_GET["numero"];
            $pos1 = $_GET["Posicion1"];
            $pos2 = $_GET["Posicion2"];

            echo mostrarIntervalo($num, $pos1, $pos2);
        }
    ?>
</body>
</html>