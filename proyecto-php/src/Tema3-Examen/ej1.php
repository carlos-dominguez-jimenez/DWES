<?php
$imagen = "gato.jpeg";
$respuesta = "gato";

function mostrarCuadricula(string $imagen, int $ver, bool $completa) {
    $clase = $completa ? "completa" : "";
    echo "<div id='cuadricula' class='$clase'>";
    for ($i = 0; $i < 9; $i++) {
        $x = ($i % 3) * 150;
        $y = intdiv($i, 3) * 150;

        if ($completa || $i == $ver) {
            echo "<div class='cuadro' style=\"background-image: url($imagen); background-position: -{$x}px -{$y}px;\"></div>";
        } else {
            echo "<a class='cuadro' href='ej1.php?ver=$i'></a>";
        }
    }
    echo "</div>";
}

// ---------- MAIN ----------
$ver = -1;
$acertado = false;
$fallado = false;

if (isset($_GET["ver"])) {
    $ver = (int) $_GET["ver"];
}

if (isset($_GET["intento"])) {
    $intento = strtolower(trim($_GET["intento"]));
    if ($intento === $respuesta) {
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
#cuadricula {
    display: grid;
    grid-template-columns: repeat(3, 150px);
    grid-template-rows: repeat(3, 150px);
    gap: 4px;
    justify-content: center;
    margin: 20px auto;
}
#cuadricula.completa { gap: 0; }
.cuadro {
    display: block;
    background-color: #444;
    background-size: 450px 450px;
}
</style>
</head>
<body>

<h1>Adivina la imagen</h1>

<?php mostrarCuadricula($imagen, $ver, $acertado); ?>

<?php if ($acertado) { ?>
    <h2>¡Enhorabuena, has acertado!</h2>
<?php } elseif ($fallado) { ?>
    <h2>Has fallado</h2>
    <a href="ej1.php">Volver</a>
<?php } else { ?>
    <form action="ej1.php" method="get">
        <input type="text" name="intento" placeholder="¿Qué es?" required>
        <input type="submit" value="Comprobar">
    </form>
<?php } ?>

</body>
</html>