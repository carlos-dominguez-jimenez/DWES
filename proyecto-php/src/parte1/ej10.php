<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <pre><?php 
     $base = 9;
     $filas = ($base + 1) / 2;
     $margen = 20;

     for ($i = 1; $i <= $filas; $i++) {
        for ($j = 1; $j <= $margen; $j++){
            echo " ";
        }

        for($k = 1; $k <= $filas - $i; $k++) {
            echo" ";
        }

        for ($h = 1; $h <= 2 * $i - 1; $h++) {
            echo "*";
        }
        echo "<br>";
     }
    ?></pre>
</body>
</html>