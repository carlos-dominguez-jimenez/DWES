<?php
require_once 'conexion.php';
/** @var PDO $conexion */

$mensaje = "";

if (isset($_POST['dni'])) {
    $consulta = $conexion->prepare("SELECT dni FROM cliente WHERE dni = ?");
    $consulta->execute([$_POST['dni']]);

    if ($consulta->rowCount() > 0) {
        $mensaje = "Ya existe un cliente con DNI " . $_POST['dni'];
    } else {
        $insercion = $conexion->prepare("INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES (?, ?, ?, ?)");
        $insercion ->execute([$_POST['dni'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono']]);
        header("Location: index.php?msg=Cliente dado de alta correctamente");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alta de clientes</title>
</head>
<body>
    <h2>Base de datos<u>banco</u> - Alta de clientes</h2>

    <?php if ($mensaje !="") { ?>
        <p><b><?=  $mensaje ?></b></p>
        <?php } ?>

        <form action="alta.php" method="post">
            DNI <input type="text" name="dni" maxlength="9" required><br>
            Nombre <input type="text" name="nombre" required><br>
            Dirección <input type="text" name="direccion"><br>
            Teléfono <input type="number" name="telefono"><br>
            <input type="submit" value="Enviar">
        </form>

        <p><a href="index.php">Volver al listado</a></p>
</body>
</html>