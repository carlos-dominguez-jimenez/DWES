<?php

    function calcularMeida(float $t1, float $t2, float $t3) {
        $media = ($t1 + $t2 + $t3) / 3;

        return $media;
    }

    function mostrarTabla(float $a1, float $a2, float $a3) {
        
        echo "<tr>";
        echo "<th>Tienda1</th>";
        echo "<th>Tienda2</th>";
        echo "<th>Tienda3</th>";
        echo "<th>Media</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        echo $a1;
        echo "</td>";
        echo "<td>";
        echo $a2;
        echo "</td>";
        echo "<td>";
        echo $a3;
        echo "</td>";
        echo "<td></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td>";
        echo calcularMeida($a1, $a2, $a3);
        echo "</td>";
        echo "</tr>";

    }

    if (isset($_GET["tienda1"])){
        $tienda1 = $_GET["tienda1"];
        $tienda2 = $_GET["tienda2"];
        $tienda3 = $_GET["tienda3"]; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <table border="1">
        <?php   
        mostrarTabla($tienda1, $tienda2, $tienda3);
        ?>
    </table>
</body>
</html>
 

<?php
} else {
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej4.php" method="get">
        Tienda 1: <input type="num" name="tienda1"><br>
        Tienda 2: <input type="num" name="tienda2"><br>
        Tienda 3: <input type="num" name="tienda3"><br>
        <input type="submit" value="calcular">
    </form>

    
</body>
</html>
<?php
}
?>