<?php
try {
    $conexion = new PDO("mysql:host=db;dbname=gestisimal;charset=utf8", "root", "root");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de base de datos.<br>";

    die("Error: " . $e->getMessage());
}
?>