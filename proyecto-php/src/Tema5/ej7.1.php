<!--Crea código php donde a través de la función escribirNumerosMod escribas en el fichero los números 2, 8, 14. Luego,
mediante la función leerContenidoFichero muestra el contenido del fichero. Ahora con la función
escribirNumerosMod amplía el contenido del fichero y añádele los números 33, 11 y 16. Muestra nuevamente el
contenido del fichero por pantalla. Finalmente, escribe el fichero pasándole un array con los número 4, 99, 12 y
parámetro <<sobreescribir>> para eliminar los datos que existieran previamente. Muestra el contenido del fichero
por pantalla y un mensaje de despedida-->

<?php
function escribirNumerosMod($fichero, $numeros, $modo = "anadir") {
    if ($modo == "sobreescribir") {
        $f = fopen($fichero, "w");
    } else {
        $f = fopen($fichero, "a");
    }

    if (!$f) {
        return false;
    }

    foreach($numeros as $numero) {
        fwrite($f, $numero . "\n");
    }

    fclose($f);
    return true;
}

function leerContenidoFichero($fichero) {
    if (!file_exists($fichero)) {
        return "";
    }
    return file_get_contents($fichero);
}

$fichero = "numeros.txt";

if (file_exists($fichero)) {
    unlink($fichero);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ficheros</title>
</head>
<body>
    <?php
    // 1. Escribir 2, 8, 14
    escribirNumerosMod($fichero, array(2, 8, 14));
    echo "<h3>Contenido tras escribir 2, 8, 14:</h3>";
    echo nl2br(leerContenidoFichero($fichero));

    // 2. Ampliar con 33, 11, 16
    escribirNumerosMod($fichero, array(33, 11, 16));
    echo "<h3>Contenido tras añadir 33, 11, 16:</h3>";
    echo nl2br(leerContenidoFichero($fichero));

    // 3. Sobreescribir con 4, 99, 12
    escribirNumerosMod($fichero, array(4, 99, 12), "sobreescribir");
    echo "<h3>Contenido tras sobreescribir con 4, 99, 12:</h3>";
    echo nl2br(leerContenidoFichero($fichero));

    echo "<p>¡Hasta luego!</p>";
    ?>
</body>
</html>