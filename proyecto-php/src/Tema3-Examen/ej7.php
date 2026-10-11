<?php
$jugado = isset($_GET["serie"]);

if ($jugado) {
    $apuesta = 1;

    // Combinación ganadora: 6 números distintos entre 1 y 49
    $ganadora = [];
    while (count($ganadora) < 6) {
        $n = rand(1, 49);
        if (!in_array($n, $ganadora)) {
            $ganadora[] = $n;
        }
    }
    $serieGanadora = rand(1, 999);

    // Contar números elegidos y aciertos
    $elegidos = 0;
    $aciertos = 0;
    for ($i = 1; $i <= 49; $i++) {
        if (isset($_GET["n$i"])) {
            $elegidos++;
            if (in_array($i, $ganadora)) {
                $aciertos++;
            }
        }
    }

    // Premio por aciertos
    if ($aciertos == 4) {
        $premio = $apuesta;
    } elseif ($aciertos == 5) {
        $premio = 30;
    } elseif ($aciertos == 6) {
        $premio = 100;
    } else {
        $premio = 0;
    }

    // Premio por serie
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
<title>Lotería primitiva</title>
<style>
body { text-align: center; font-family: Arial, sans-serif; }
table { margin: 15px auto; border-collapse: collapse; }
td { border: 1px solid #999; padding: 8px 12px; }
.boleto td { background-color: #fdf2e9; }
label { cursor: pointer; }
.resultado td { width: 40px; font-size: 20px; font-weight: bold; }
.acierto { color: green; }
.fallo { color: black; }
.perdido { color: red; }
.resto { color: lightgray; }
.trampa { color: red; }
</style>
</head>
<body>

<h1>Lotería primitiva</h1>

<form action="ej7.php" method="get">
    <p>Marca tus números:</p>
    <table class="boleto">
        <?php
        for ($fila = 0; $fila < 7; $fila++) {
            echo "<tr>";
            for ($col = 1; $col <= 7; $col++) {
                $n = $fila * 7 + $col;
                echo "<td><label><input type='checkbox' name='n$n'> $n</label></td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    Número de serie (1-999): <input type="text" name="serie" required><br><br>
    <input type="submit" value="Jugar">
</form>

<?php if ($jugado) { ?>

    <h2>Resultado</h2>
    <table class="resultado">
        <?php
        for ($fila = 0; $fila < 7; $fila++) {
            echo "<tr>";
            for ($col = 1; $col <= 7; $col++) {
                $n = $fila * 7 + $col;
                $elegido = isset($_GET["n$n"]);
                $sale = in_array($n, $ganadora);

                if ($elegido && $sale) {
                    $clase = "acierto";
                } elseif ($elegido) {
                    $clase = "fallo";
                } elseif ($sale) {
                    $clase = "perdido";
                } else {
                    $clase = "resto";
                }
                echo "<td class='$clase'>$n</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <p>
        <span class="acierto">Verde: acierto</span> ·
        <span class="fallo">Negro: elegido sin acierto</span> ·
        <span class="perdido">Rojo: ganador no elegido</span> ·
        <span class="resto">Gris: resto</span>
    </p>

    <p>Números elegidos: <?php echo $elegidos; ?></p>

    <?php if ($elegido > 6 || $elegidos > 6) { ?>
        <h2 class="trampa">¡Has hecho trampas! Solo se pueden marcar 6 números.</h2>
    <?php } else { ?>
        <p>Aciertos: <?php echo $aciertos; ?></p>
        <p>Serie ganadora: <?php echo $serieGanadora; ?> -
            <?php echo $aciertoSerie ? "¡acertada! (+500 €)" : "no acertada"; ?></p>
        <h2>Dinero ganado: <?php echo $premio; ?> €</h2>
    <?php } ?>

<?php } ?>

</body>
</html>