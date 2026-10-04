<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej10.php" method="get">
        Mb: <input type="number" name="mb"><br>
        <input type="submit" value="calcular"><br>
    </form>

    <?php
        $kb = 1024;
        $mb = $_GET["mb"];

        $resultado = $mb * $kb;

        echo "$mb Mb son: $resultado Kb";
    ?>
</body>
</html>