<?php
require_once 'conexion.php';
/** @var PDO $conexion */

// Si se ha enviado el fdormulario hacemos el update
if (isset($_POST['dni'])) {
    $actualiza = $conexion->prepare("UPDATE cliente SET nombre = ?, direccion = ?, telefono = ? WHERE dni = ?");
    $actualiza->execute([$_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['dni']]);
    header("Location: index.php?msg=CLiente modificado correctamente");
    exit;
}

//Si no, cargamos los datos del cliente 
if (!isset($_GET['dni'])) {
    header("Location: index.php");
    exit;
}

$consulta = $conexion->prepare("SELECT dni, nombre, telefono FROM cliente WHERE dni = ?");
$consulta->execute([$_GET['dni']]);
$cliente = $consulta->fetchObject();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Modificar cliente</title>
</head>

<body>
    <h2>Base de datos <u>banco</u> - Modificar cliente</h2>

    <?php if (!$cliente) { ?>
        <p>No existe ningún cliente con ese DNI.</p>
    <?php } else { ?>
        <form action="modificar.php" method="post">
            DNI <b><?= $cliente->dni ?></b>
            <input type="hidden" name="dni" value="<?= $cliente->dni ?>"><br><br>
            Nombre <input type="text" name="nombre" value="<?= $cliente->nombre ?>" required><br><br>
            Dirección <input type="text" name="direccion" value="<?= $cliente->direccion ?>"><br><br>
            Teléfono <input type="text" name="telefono" value="<?= $cliente->telefono ?>"><br><br>
            <input type="submit" value="Guardar cambios">
        </form>
    <?php } ?>

    <p><a href="index.php">Volver al listado</a></p>
</body>

</html>