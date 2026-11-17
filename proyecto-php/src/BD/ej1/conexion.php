<?php
// Conexión a la base de datos (se incluye con require_once desde los demás archivos)
try {
    $conexion = new PDO("mysql:host=db;dbname=banco;charset=utf8", "root", "root");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";

    die("Error: " . $e->getMessage());
}
