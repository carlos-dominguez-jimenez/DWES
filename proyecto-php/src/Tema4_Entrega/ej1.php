<?php
session_start();

if (!isset($_SESSION['colores'])) {
    $_SESSION['colores'] = array();
    $_SESSION['fondo'] = '#FFFFFF';
    $_SESSION['vista'] = 'principal';
}

// Botón "Añadir color"
if (isset($_POST['anadir'])) {
    $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    $_SESSION['colores'][] = $color;
    $_SESSION['fondo'] = $color;
    $_SESSION['vista'] = 'principal';
}

// Botón "Mostrar paleta creada"
if (isset($_POST['paleta'])) {
    $_SESSION['vista'] = 'paleta';
}

// Botón "Seguir añadiendo colores"
if (isset($_POST['volver'])) {
    $_SESSION['vista'] = 'principal';
}

// Botón "Nueva paleta": destruye la sesión y empieza de cero
if (isset($_POST['nueva'])) {
    session_destroy();
    header('Location: ej1.php');
    exit;
}

// Clic en una celda: el fondo pasa a ser el color de esa celda
if (isset($_GET['indice']) && isset($_SESSION['colores'][$_GET['indice']])) {
    $_SESSION['fondo'] = $_SESSION['colores'][$_GET['indice']];
    $_SESSION['vista'] = 'paleta';
}

$colores = $_SESSION['colores'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de paleta</title>
    <style>
        table { border-collapse: collapse; }
        td { border: 1px solid #000; padding: 0; }
        td a {
            display: block;
            width: 100px;
            height: 80px;
            line-height: 80px;
            text-align: center;
            color: #fff;
            text-shadow: 0 0 3px #000;
            text-decoration: none;
        }
    </style>
</head>
<body style="background-color: <?= $_SESSION['fondo'] ?>">

<?php if ($_SESSION['vista'] == 'principal'): ?>

    <h1>Generador de paleta</h1>
    <p>Colores generados: <?= count($colores) ?></p>

    <form action="ej1.php" method="post">
        <input type="submit" name="anadir" value="Añadir color">
        <input type="submit" name="paleta" value="Mostrar paleta creada">
    </form>

<?php else: ?>

    <h1>Paleta creada</h1>

    <?php if (count($colores) == 0): ?>
        <p>Todavía no has generado ningún color.</p>
    <?php else: ?>
        <table>
            <?php
            foreach ($colores as $i => $color) {
                if ($i % 5 == 0) {
                    echo "<tr>";
                }
                echo "<td style='background-color: $color'>";
                echo "<a href='ej1.php?indice=$i'>$color</a>";
                echo "</td>";
                if ($i % 5 == 4) {
                    echo "</tr>";
                }
            }
            if (count($colores) % 5 != 0) {
                echo "</tr>";
            }
            ?>
        </table>
    <?php endif; ?>

    <br>
    <form action="ej1.php" method="post">
        <input type="submit" name="volver" value="Seguir añadiendo colores">
        <input type="submit" name="nueva" value="Nueva paleta">
    </form>

<?php endif; ?>

</body>
</html>