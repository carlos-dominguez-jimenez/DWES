<?php
require_once 'conexion.php';
/** @var PDO $conexion */

$mensaje = "";

if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
    $descripcion = trim($_POST['descripcion']);
    $precioCompra = $_POST['precio_compra'];
    $precioVenta = $_POST['precio_venta'];

    $actualiza = $conexion->prepare("UPDATE articulo SET descripcion = ?, precio_compra = ?, precio_venta = ? WHERE codigo = ?");
    $actualiza->execute([$descripcion, $precioCompra, $precioVenta, $codigo]);
    $conexion = null;
    header("Location: index.php?msg=" . urlencode("Artículo $codigo modificado correctamente."));
    exit;
} elseif (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
} else {
    header("Location: index.php");
    exit;
}

$consulta = $conexion->prepare("SELECT codigo, descripcion, precio_compra, precio_venta, stock FROM articulo WHERE codigo = ?");
$consulta->execute(['codigo']);
$articulo = $consulta->fetchObject();
$conexion = null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Modificar artículo</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>GESTISIMAL</h1>
    <h2>Modificar artículo</h2>

    <?php if ($mensaje != "") { ?>
        <p class="msg-error"><?= htmlspecialchars($mensaje) ?></p>
    <?php } ?>

    <?php if (!$articulo) { ?>
        <p>No existe ningún artículo con ese código.</p>
    <?php } else { ?>
        <form action="modificar.php" method="post">
            Código <b><?= htmlspecialchars($articulo->codigo) ?></b>
            <input type="hidden" name="codigo" value="<?= htmlspecialchars($articulo->codigo) ?>"><br><br>
            Descripción <input type="text" name="descripcion" value="<?= htmlspecialchars($articulo->descripcion) ?>" required><br><br>
            Precio de compra <input type="number" name="precio_compra" step="0.01" min="0" value="<?= $articulo->precio_compra ?>" required><br><br>
            Precio de venta <input type="number" name="precio_venta" step="0.01" min="0" value="<?= $articulo->precio_venta ?>" required><br><br>
            Stock actual: <b><?= $articulo->stock ?></b> (se cambia con Entrada / Salida)<br><br>
            <input class="btn amarillo" type="submit" value="Guardar cambios">
        </form>
    <?php } ?>

    <p><a href="index.php">Volver al listado</a></p>
</body>

</html>