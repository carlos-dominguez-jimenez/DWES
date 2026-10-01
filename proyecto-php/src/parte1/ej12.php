<!DOCTYPE html>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pirámide Invertida Hueca</title>
</head>
<body>
    <pre><?php 
     $base = 9;
     $filas = ($base + 1) / 2;
     $margen = 20;

     for ($i = $filas; $i >= 1; $i--) {
        
        // 1. Margen de la página
        for ($j = 1; $j <= $margen; $j++){
            echo " ";
        }

        // 2. Espacios para centrar los asteriscos
        for($k = 1; $k <= $filas - $i; $k++) {
            echo " ";
        }

        // 3. Contorno de la pirámide
        for ($h = 1; $h <= 2 * $i - 1; $h++) {
            // Imprime '*' si es el inicio, el final, o la base (que ahora está arriba)
            if ($h == 1 || $h == (2 * $i - 1) || $i == $filas) {
                echo "*";
            } else {
                echo " ";
            }
        }
        
        echo "\n";
     }
    ?></pre>
</body>
</html>