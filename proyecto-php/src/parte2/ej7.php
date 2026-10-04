<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej7.php" method="get">
    Base imponible: <input type="number" name="base"><br>
    <input type="submit" value="calcular"><br>
    </form>

    <?php
        $iva = 0.21;

        $base = $_GET["base"];

        $importeIVA = $base*$iva;
        $total = $base+$importeIVA;

        echo "Total: " . $total;
    ?>
</body>
</html>