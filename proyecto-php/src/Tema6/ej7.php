<?php
// Escribe un array de números en el fichero, un número por línea.
// $modo = "anadir" (por defecto) añade al final; "sobreescribir" borra lo anterior.
function escribirNumerosMod($fichero, $numeros, $modo = "anadir") {
    if ($modo == "sobreescribir") {
        $f = fopen($fichero, "w"); // "w" vacía el fichero
    } else {
        $f = fopen($fichero, "a"); // "a" escribe al final
    }

    if (!$f) {
        return false;
    }

    foreach ($numeros as $numero) {
        fwrite($f, $numero . "\n");
    }

    fclose($f);
    return true;
}

// Devuelve el contenido del fichero
function leerContenidoFichero($fichero) {
    if (!file_exists($fichero)) {
        return "";
    }
    return file_get_contents($fichero);
}

$fichero = "numeros.txt";

// Para que el ejercicio empiece siempre igual, se borra el fichero si existe
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