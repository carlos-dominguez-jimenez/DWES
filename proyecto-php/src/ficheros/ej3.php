<?php
function obtenerArrNum($ruta): array {
    $numeros = [];

    if(file_exists($ruta)) {
        $archivo = fopen($ruta, 'r');

        if($archivo) {
            while (($linea = fgets($archivo)) !==false) {
                $linea = trim($linea);
                if ($linea !== "") {
                    $numeros[] = $linea;
                }
            }
            fclose($archivo);
        } else {
            echo "ERROR: No se tienen permisos para leer el archivo<br>";
        }
    } else {
        echo "ERROR: EL archivo no existe.<br>";
    }

    return $numeros;
}

$rutaDelArchivo = __DIR__ . '/datosEjercicio.txt';
$arr = obtenerArrNum($rutaDelArchivo);

foreach ($arr as $indice => $valor) {
    echo "Posición $indice: $valor<br>";
}
?>