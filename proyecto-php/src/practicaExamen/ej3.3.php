<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <?php
        function mostrarDigito($numero, $posicion1, $posicion2) {
            $resultado = "";
        
            for ($i = $posicion1; $i <= $posicion2; $i++) {
                $resultado = $numero[$i];
            }
            return $resultado;
        }
    ?>

    <form action="ej3.3.php" method="get">
        Número: <input type="number" name="numero">
        Posición 1: <input type="number" name="posicion1">
        Posición 2: <input type="number" name="posicion2">
        <input type="submit" value="Mostrar">
    </form>

    <?php
        if (isset($_GET["numero"], $_GET["posicion1"], $_GET["posicion2"])) {
            $num = $_GET["numero"];
            $pos1 = $_GET["posicion1"];
            $pos2 = $_GET["posicion2"];

            echo "Entre la posicion $pos1 y $pos2 están los números: " . mostrarDigito($num, $pos1, $pos2);
        }
    ?>
</body>
</html>