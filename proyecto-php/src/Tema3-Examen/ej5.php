<?php
$filaAbierta = -1;
$colAbierta = -1;

if (isset($_GET["fila"], $_GET["col"])) {
    $filaAbierta = (int) $_GET["fila"];
    $colAbierta = (int) $_GET["col"];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ojos</title>
<style>
body { text-align: center; font-family: Arial, sans-serif; }
table { margin: 15px auto; border-collapse: collapse; }
td { padding: 2px; }
img { display: block; }
</style>
</head>
<body>

<h1>Ojos</h1>

<table>
    <?php
    for ($fila = 1; $fila <= 10; $fila++) {
        echo "<tr>";
        for ($col = 1; $col <= 10; $col++) {
            if ($fila == $filaAbierta && $col == $colAbierta) {
                $imagen = "ojo_abierto.png";
            } else {
                $imagen = "ojo_cerrado.jpeg";
            }
            echo "<td><a href='ej5.php?fila=$fila&amp;col=$col'><img src='$imagen' width='40' height='40' alt='ojo'></a></td>";
        }
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>