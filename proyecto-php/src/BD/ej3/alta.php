<?php
require_once 'conexion.php'; //conexión a la base de datos

// Si se entra sin enviar el formulario, volvemos al listado
if (!isset($_POST['codigo'])) {
    header("Location: index.php");
    exit;
}

$codigo = trim($_POST['codigo']);
$descripcion = trim($_POST['descripcion']);
$precioCompra = $_POST['precioCompra'];
$precioVenta = $_POST['precio_venta'];
$stock = $_POST['stock'];

// Comprobamos que no exista un artículo con ese código
?>