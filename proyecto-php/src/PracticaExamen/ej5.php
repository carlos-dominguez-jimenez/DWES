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

            $radio = $diametro/2;
            $volumen = pi() * pow($radio, 2) * $altura;
            $litros = $volumen/1000;

            $totalTiempo = (int) round($litros / $caudal);
            $horas = intdiv($totalTiempo, 60);
            $minutos = ($totalTiempo % 60);

            echo "<h2>Tiempo de llenado: $horas h $minutos min</h2>";
            
        } else {
            echo "<h2>Introduce datos válidos</h2>";
        }
    ?>
</body>
</html>