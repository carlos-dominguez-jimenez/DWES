<?php
require_once 'conexion.php';

$mensaje = "";

if (isset($_POST['dni'])) {
    $consulta = $conexion->prepare("SELECT dni FROM cliente WHERE dni = ?");
    $consulta->execute([$_POST['dni']]);

    if ($consulta->rowCount() > 0) {
        $mensaje = "Ya existe un cliente con DNI " . $_POST['dni'];
    } else {
        $insercion = $conexion->prepare("INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES (?, ?, ?, ?)");
        $insercion ->execute([$_POST['dni'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono']]);
        $conexion = null;
        header("Location: index.php?msg=Cliente dado de alta correctamente");
        exit;
    }
}
