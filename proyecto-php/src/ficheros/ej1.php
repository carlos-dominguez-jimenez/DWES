<?php

function escribirTresNumeros($num1, $num2, $num3): void {
    $archivo = fopen('/tmp/datosEjercicio.txt', 'w');

    if ($archivo) {
        fwrite($archivo, $num1 . PHP_EOL);
        fwrite($archivo, $num2 . PHP_EOL);
        fwrite($archivo, $num3 . PHP_EOL);

        fclose($archivo);
        echo "El archivo ha sido creado";
    } else {
        echo "ERROR: No se pudo crear o abrir el archivo";
    }
}

escribirTresNumeros(1, 2, 3);
?>