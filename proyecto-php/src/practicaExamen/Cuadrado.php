<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
</head>
<body>
<pre><?php
$lado = 9;
$margen = 10;

for ($i = 1; $i <= $lado; $i++) {

    // Margen izquierdo
    for ($j = 1; $j <= $margen; $j++) {
        echo " ";
    }

    // Columnas del cuadrado
    for ($k = 1; $k <= $lado; $k++) {
        if ($i == 1 || $i == $lado || $k == 1 || $k == $lado) {
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