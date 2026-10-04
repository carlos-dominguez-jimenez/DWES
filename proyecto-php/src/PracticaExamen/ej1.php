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


    <form action="ej1.php" method="get">
        Altura: <input type="num" name="altura"><br>
        Diametro: <input type="num" name="diametro"><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        $altura = $_GET["altura"];
        $diametro = $_GET["diametro"];

        $radio = $diametro/2;
        $volumen = pi() * pow($radio, 2) * $altura;

        echo "<h2>El volumen es: " . $volumen . " cm³</h2>";
        echo "<img src='cilindro.png' width='200' alt='Cilindro'>"
    ?>
</body>
</html>