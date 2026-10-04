<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej11.php" method="get">
        Kb: <input type="number" name="kb"><br>
        <input type="submit" value="calcular"><br>
    </form>

    <?php
        $Mb = 1024;
        $kb = $_GET["kb"];

        $resultado = $kb / $Mb;

        echo "$kb Kb son: $resultado Mb";
    ?>
</body>
</html>