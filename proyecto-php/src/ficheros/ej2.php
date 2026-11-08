<?php
    function obtenerSuma($ruta): int {
        $suma = 0;

        if (file_exists($ruta)) {
            $archivo = fopen($ruta, 'r');

            if ($archivo) {
                // Leemos el archivo línea por línea hasta que no haya más
                while (($linea = fgets($archivo)) !== false) {
                    //trim() limpia los saltos de línea
                    $suma += trim($linea);
                }

                //Cerramos el archivo
                fclose($archivo);
            } else {
                echo "ERROR: No se tienen permisos para leer el archivo.<br>";
            }
        } else {
            "ERROR: El archivo no existe.<br>";
        }

        //Al ser una función, debe devolver un valor con return
        return $suma;
    }
    $rutaDelArchivo = __DIR__ . '/datosEjercicio.txt';
    $total = obtenerSuma($rutaDelArchivo);

    echo "La suma total de los números en el archivo es: " . $total;
?>