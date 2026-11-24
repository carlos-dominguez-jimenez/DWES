<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
</head>

<body>
    <h2>
        Base de datos <u>banco</u><br>
        Tabla <u>cliente</u><br>
    </h2>

    <?php
    require_once 'conexion.php'; // conexión a la base de datos
    /** @var PDO $conexion */
    $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente");

    // Mensaje que llega desde alta, baja o modificar
    if (isset($_GET['msg'])) {
        echo "<p><b>" . $_GET['msg'] . "</b></p>";
    }
    ?>

    <p><a href="alta.php">Alta de cliente</a></p>

    <table border="1">
        <tr>
            <td><b>DNI</b></td>
            <td><b>Nombre</b></td>
            <td><b>Dirección</b></td>
            <td><b>Teléfono</b></td>
            <td><b>Acciones</b></td>
        </tr>
        <?php
        while ($cliente = $consulta->fetchObject()) {
        ?>
            <tr>
                <td><?= $cliente->dni ?></td>
                <td><?= $cliente->nombre ?></td>
                <td><?= $cliente->direccion ?></td>
                <td><?= $cliente->telefono ?></td>
                <td>
                    <a href="modificar.php?dni=<?= $cliente->dni ?>">Modificar</a>
                    <form action="baja.php" method="post" style="display:inline">
                        <input type="hidden" name="dni" value="<?= $cliente->dni ?>">
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    Número de clientes: <?= $consulta->rowCount() ?>
    <?php $conexion = null; // cerramos la conexión a la BD 
    ?>
</body>

</html>