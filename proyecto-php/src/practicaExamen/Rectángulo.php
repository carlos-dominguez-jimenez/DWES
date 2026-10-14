<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
</head>
<body>
<pre><?php
$ancho = 12;
$alto = 6;
$margen = 10;

for ($i = 1; $i <= $alto; $i++) {

    // Margen izquierdo
    for ($j = 1; $j <= $margen; $j++) {
        echo " ";
    }

    // Columnas del rectángulo
    for ($k = 1; $k <= $ancho; $k++) {
        if ($i == 1 || $i == $alto || $k == 1 || $k == $ancho) {
            echo "* ";
        } else {
            echo "  ";
        }
    }

    echo "<br>";
}
?></pre>
</body>
</html>