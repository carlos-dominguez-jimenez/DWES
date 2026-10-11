<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <?php
        function mostrarIntervalo ($numAnalizar, int $posPrimera, int $posUltima) {
            $resultado = "";
        
            for ($i = $posPrimera; $i <= $posUltima; $i++) {
              $resultado = $resultado . $numAnalizar[$i];
            }
                return $resultado;
        }
    ?>
    <form action="ej3.php" method="get">
        Introduce el número entero: <input type="number" name="numero">
        Primer número quieres mostrar: <input type="number" name="posicion1">
        Último número quieres mostrar: <input type="number" name="posicion2">
        <input type="submit" value="Mostrar">
    </form>
    <?php
        if (isset($_GET["numero"], $_GET["posicion1"], $_GET["posicion2"])) {
            $num = $_GET["numero"];
            $pos1 = $_GET["posicion1"];
            $pos2 = $_GET["posicion2"];

            echo mostrarIntervalo($num, $pos1, $pos2);
        }
    ?>
</body>
</html>