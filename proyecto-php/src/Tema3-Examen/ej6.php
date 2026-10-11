<?php
$imagen = "gato.jpeg";
$respuesta = "gato";

$ver = -1;
$acertado = false;
$fallado = false;

if (isset($_GET["ver"])) {
    $ver = (int) $_GET["ver"];
}

if (isset($_GET["intento"])) {
    if (strtolower(trim($_GET["intento"])) === $respuesta) {
        $acertado = true;
    } else {
        $fallado = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Adivina la imagen</title>
<?php
if ($ver >= 0 && $ver <= 8) {
    echo '<meta http-equiv="refresh" content="2;url=ej1.php">';
}
?>
<style>
body { text-align: center; font-family: Arial, sans-serif; }
table { margin: 20px auto; border-spacing: 4px; }
table.completa { border-spacing: 0; }
td { padding: 0; }
.cuadro {
    display: block;
    width: 150px;
    height: 150px;
    background-color: #444;
    background-size: 450px 450px;
}
</style>
</head>
<body>

<h1>Adivina la imagen</h1>

<table class="<?php echo $acertado ? 'completa' : ''; ?>">
    <?php
    for ($fila = 0; $fila < 3; $fila++) {
        echo "<tr>";
        for ($col = 0; $col < 3; $col++) {
            $n = $fila * 3 + $col;
            $x = $col * 150;
            $y = $fila * 150;

            if ($acertado || $n == $ver) {
                echo "<td><div class='cuadro' style=\"background-image: url($imagen); background-position: -{$x}px -{$y}px;\"></div></td>";
            } else {
                echo "<td><a class='cuadro' href='ej1.php?ver=$n'></a></td>";
            }
        }
        echo "</tr>";
    }
    ?>
</table>

<?php if ($acertado) { ?>
    <h2>¡Enhorabuena, has acertado!</h2>
<?php } elseif ($fallado) { ?>
    <h2>Has fallado</h2>
    <a href="ej6.php">Volver</a>
<?php } else { ?>
    <form action="ej6.php" method="get">
        <input type="text" name="intento" placeholder="¿Qué es?" required>
        <input type="submit" value="Comprobar">
    </form>
<?php } ?>

</body>
</html>