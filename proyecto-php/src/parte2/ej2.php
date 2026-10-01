<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej2.php" method="get">
        Euros: <input type="num" name="euros"><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        $pesetas = 166;

        $euros = $_GET["euros"];

        $resultado = $euros * $pesetas;

        echo "$euros x $pesetas = $resultado"
    ?>
</body>
</html>