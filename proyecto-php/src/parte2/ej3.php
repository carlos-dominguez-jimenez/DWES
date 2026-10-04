<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej3.php" method="get">
        Pesetas: <input type = "num" name = "pesetas"><br>
        <input type = "submit" value="calcular"><br>
    </form>

    <?php
    $euros = 0.01;

    $pesetas = $_GET["pesetas"];

    $resultado = $pesetas * $euros;

    echo "$pesetas pesetas son: $resultado euros"
    ?>
</body>
</html>