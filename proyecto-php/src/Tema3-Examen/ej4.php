<?php
$mensaje = "";

if (isset($_GET["bloque"], $_GET["piso"])) {
    $bloque = (int) $_GET["bloque"];
    $piso = (int) $_GET["piso"];

    if ($bloque >= 1 && $bloque <= 10 && $piso >= 1 && $piso <= 7) {
        $mensaje = "Usted ha llamado al piso $piso del bloque $bloque";
    } else {
        $mensaje = "Datos no válidos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Portero automático</title>
<style>
body { text-align: center; font-family: Arial, sans-serif; }
table { margin: 15px auto; border-collapse: collapse; }
td, th { border: 1px solid #333; padding: 6px 20px; }
th { background-color: #ddd; }
form { margin: 0; }
</style>
</head>
<body>

<h1>Portero automático</h1>

<?php
if ($mensaje != "") {
    echo "<h2>$mensaje</h2>";
}
?>

<table>
    <tr>
        <th>Bloque</th>
        <th>Piso</th>
        <th>Llamar</th>
    </tr>
    <?php
    for ($bloque = 1; $bloque <= 10; $bloque++) {
        for ($piso = 1; $piso <= 7; $piso++) {
            echo "<tr>";
            echo "<td>$bloque</td>";
            echo "<td>$piso</td>";
            echo "<td>";
            echo "<form action='ej4.php' method='get'>";
            echo "<input type='hidden' name='bloque' value='$bloque'>";
            echo "<input type='hidden' name='piso' value='$piso'>";
            echo "<input type='submit' value='Llamar'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>

</body>
</html>