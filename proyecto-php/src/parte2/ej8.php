<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej8.php" method="get">
        Horas: <input type="num" name="horas"><br>
        <input type="submit" value="Calcular salario">
    </form>

    <?php
        $horas = $_GET["horas"];

        $salario = $horas * 12;
        echo "EL salario semanal es: " . $salario;
    ?>
</body>
</html>