<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <style>
        body {
            background-color: lightblue;
            text-align: center;
            font-family: Arial, sans-serif;
        }

    </style>
</head>
<body>

<?php
    function calcularTiempo( float $alt, float $diam, float $cau) {
        $radio = $diam/2;
        $volumen = pi() * pow($radio, 2) * $alt;
        $litros = $volumen/1000;

        $totalTiempo = (int) round($litros / $cau);
        $horas = intdiv($totalTiempo, 60);
        $minutos = ($totalTiempo % 60);

        echo "<h2>Tiempo de llenado: $horas h $minutos min</h2>";
    }
?>

<h1>Calculo del volumen de un cilindro</h1>


    <form action="ej5.php" method="get">
        Altura: <input type="num" name="altura" step="any"><br>
        Diametro: <input type="num" name="diametro" step="any"><br>
        Caudal(l/min): <input type="number" name="caudal" step="any"><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        if (isset ($_GET["altura"], $_GET["diametro"], $_GET["caudal"])) {
            $altura = $_GET["altura"];
            $diametro = $_GET["diametro"];
            $caudal = $_GET["caudal"];

            calcularTiempo($altura, $diametro, $caudal);

        } else {
            echo "<h2>Introduce datos válidos</h2>";
        }
    ?>
</body>
</html>