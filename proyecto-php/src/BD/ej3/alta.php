<?php
require_once 'conexion.php'; //conexión a la base de datos
/** @var PDO $conexion */

// Si se entra sin enviar el formulario, volvemos al listado
if (!isset($_POST['codigo'])) {
    header("Location: index.php");
    exit;
}

$codigo = trim($_POST['codigo']);
$descripcion = trim($_POST['descripcion']);
$precioCompra = $_POST['precio_compra'];
$precioVenta = $_POST['precio_venta'];
$stock = $_POST['stock'];

// Comprobamos que no exista un artículo con ese código
$consulta = $conexion->prepare("SELECT codigo FROM articulo WHERE codigo = ?");
$consulta->execute([$codigo]);
if ($consulta->rowCount() > 0) {
    $error = "Ya existe un artículo con código $codigo.";
}

if (isset($error)) {
    $conexion = null;
    header("Location: index.php?error=" . urlencode($error));
    exit;
}

//INSERT del nuevo artículo
$insercion = $conexion->prepare("INSERT INTO articulo (codigo, descripcion, precio_compra, precio_venta, stock) VALUES (?, ?, ?, ?, ?)");
$insercion->execute([$codigo, $descripcion, $precioCompra, $precioVenta, $stock]);
$conexion = null;
header("Location: index.php?msg=" . urlencode("Artículo $codigo dado de alta correctamente."));
exit;
?>