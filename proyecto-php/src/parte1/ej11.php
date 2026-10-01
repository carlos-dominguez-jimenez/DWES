<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contorno de Pirámide con Base</title>
</head>
<body>
    <pre><?php 
     $base = 9;
     $filas = ($base + 1) / 2;
     $margen = 20;

     for ($i = 1; $i <= $filas; $i++) {
        // Margen inicial
        for ($j = 1; $j <= $margen; $j++){
            echo " ";
        }

        // Espacios para centrar
        for($k = 1; $k <= $filas - $i; $k++) {
            echo " ";
        }

        // Dibujo del contorno (Lados + Base)
        for ($h = 1; $h <= 2 * $i - 1; $h++) {
            // Se dibuja asterisco si es el inicio, el final, o si llegamos a la última fila (la base)
            if ($h == 1 || $h == (2 * $i - 1) || $i == $filas) {
                echo "*";
            } else {
                echo " "; // Todo lo demás por dentro queda vacío
            }
        }
        echo "\n";
     }
    ?></pre>
</body>
</html>