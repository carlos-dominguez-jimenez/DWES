<?php
$jugando = isset($_GET["serie"]);

if (!$jugando) {
    // ---------- CARTÓN ALEATORIO ----------
    // Fila 1 (columnas 1, 2, 4, 6 y 8)
    $a1 = rand(1, 4);
    $a2 = rand(10, 14);
    $a3 = rand(30, 34);
    $a4 = rand(50, 54);
    $a5 = rand(70, 74);
    // Fila 2 (columnas 2, 3, 5, 7 y 9)
    $b1 = rand(15, 19);
    $b2 = rand(20, 29);
    $b3 = rand(40, 49);
    $b4 = rand(60, 69);
    $b5 = rand(80, 84);
    // Fila 3 (columnas 1, 4, 6, 8 y 9)
    $c1 = rand(5, 9);
    $c2 = rand(35, 39);
    $c3 = rand(55, 59);
    $c4 = rand(75, 79);
    $c5 = rand(85, 90);
} else {
    // ---------- SORTEO Y RESULTADO ----------
    $apuesta = 1;

    $g1 = rand(1, 90);
    $g2 = rand(1, 90);
    $g3 = rand(1, 90);
    $g4 = rand(1, 90);
    $g5 = rand(1, 90);
    $g6 = rand(1, 90);
    $serieGanadora = rand(1, 999);

    // Un checkbox solo existe en $_GET si está marcado
    $aciertos = 0;
    if (isset($_GET["n" . $g1])) { $aciertos++; }
    if (isset($_GET["n" . $g2])) { $aciertos++; }
    if (isset($_GET["n" . $g3])) { $aciertos++; }
    if (isset($_GET["n" . $g4])) { $aciertos++; }
    if (isset($_GET["n" . $g5])) { $aciertos++; }
    if (isset($_GET["n" . $g6])) { $aciertos++; }

    if ($aciertos == 4) {
        $premio = $apuesta;
    } elseif ($aciertos == 5) {
        $premio = 30;
    } elseif ($aciertos == 6) {
        $premio = 100;
    } else {
        $premio = 0;
    }

    $aciertoSerie = ($_GET["serie"] == $serieGanadora);
    if ($aciertoSerie) {
        $premio = $premio + 500;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cartón de bingo</title>
<style>
body { text-align: center; font-family: Arial, sans-serif; }
table { margin: 15px auto; border-collapse: collapse; }
td, th { border: 2px solid #c0392b; padding: 8px 12px; }
.carton td { width: 60px; height: 50px; background-color: #fdf2e9; }
.carton td.vacio { background-color: #c0392b; }
label { cursor: pointer; }
</style>
</head>
<body>

<h1>Cartón de bingo</h1>

<?php if (!$jugando) { ?>

    <form action="ej2.php" method="get">
        <p>Marca tus números:</p>
        <table class="carton">
            <tr>
                <td><label><input type="checkbox" name="n<?php echo $a1; ?>"> <?php echo $a1; ?></label></td>
                <td><label><input type="checkbox" name="n<?php echo $a2; ?>"> <?php echo $a2; ?></label></td>
                <td class="vacio"></td>
                <td><label><input type="checkbox" name="n<?php echo $a3; ?>"> <?php echo $a3; ?></label></td>
                <td class="vacio"></td>
                <td><label><input type="checkbox" name="n<?php echo $a4; ?>"> <?php echo $a4; ?></label></td>
                <td class="vacio"></td>
                <td><label><input type="checkbox" name="n<?php echo $a5; ?>"> <?php echo $a5; ?></label></td>
                <td class="vacio"></td>
            </tr>
            <tr>
                <td class="vacio"></td>
                <td><label><input type="checkbox" name="n<?php echo $b1; ?>"> <?php echo $b1; ?></label></td>
                <td><label><input type="checkbox" name="n<?php echo $b2; ?>"> <?php echo $b2; ?></label></td>
                <td class="vacio"></td>
                <td><label><input type="checkbox" name="n<?php echo $b3; ?>"> <?php echo $b3; ?></label></td>
                <td class="vacio"></td>
                <td><label><input type="checkbox" name="n<?php echo $b4; ?>"> <?php echo $b4; ?></label></td>
                <td class="vacio"></td>
                <td><label><input type="checkbox" name="n<?php echo $b5; ?>"> <?php echo $b5; ?></label></td>
            </tr>
            <tr>
                <td><label><input type="checkbox" name="n<?php echo $c1; ?>"> <?php echo $c1; ?></label></td>
                <td class="vacio"></td>
                <td class="vacio"></td>
                <td><label><input type="checkbox" name="n<?php echo $c2; ?>"> <?php echo $c2; ?></label></td>
                <td class="vacio"></td>
                <td><label><input type="checkbox" name="n<?php echo $c3; ?>"> <?php echo $c3; ?></label></td>
                <td class="vacio"></td>
                <td><label><input type="checkbox" name="n<?php echo $c4; ?>"> <?php echo $c4; ?></label></td>
                <td><label><input type="checkbox" name="n<?php echo $c5; ?>"> <?php echo $c5; ?></label></td>
            </tr>
        </table>

        Número de serie (1-999): <input type="text" name="serie" required><br><br>
        <input type="submit" value="Jugar">
    </form>

<?php } else { ?>

    <h2>Combinación ganadora</h2>
    <table>
        <tr>
            <td><?php echo $g1; ?></td>
            <td><?php echo $g2; ?></td>
            <td><?php echo $g3; ?></td>
            <td><?php echo $g4; ?></td>
            <td><?php echo $g5; ?></td>
            <td><?php echo $g6; ?></td>
        </tr>
    </table>
    <p>Serie ganadora: <?php echo $serieGanadora; ?></p>

    <h2>Resultado</h2>
    <p>Aciertos: <?php echo $aciertos; ?></p>
    <p>Serie: <?php echo $aciertoSerie ? "¡Acertada! (+500 €)" : "No acertada"; ?></p>
    <p>Dinero ganado: <?php echo $premio; ?> €</p>

    <a href="ej2.php">Jugar con un cartón nuevo</a>

<?php } ?>

</body>
</html>