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

    // Paginación: 5 clientes por página
    $porPagina = 5;
    $total = $conexion->query("SELECT COUNT(*) FROM cliente")->fetchColumn();
    $totalPaginas = max(1, (int) ceil($total / $porPagina));

    $pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
    if ($pagina < 1) {
        $pagina = 1;
    }
    if ($pagina > $totalPaginas) {
        $pagina = $totalPaginas;
    }
    $inicio = ($pagina - 1) * $porPagina;

    $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente ORDER BY dni LIMIT $inicio, $porPagina");

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
                    <form action="baja.php" method="post" style="display:inline" onsubmit="return confirm('¿Seguro que quieres borrar al cliente<?=  $cliente->dni ?>?')">
                        <input type="hidden" name="dni" value="<?= $cliente->dni ?>">
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <div class="paginacion">
        Página <?= $pagina ?> de <?= $totalPaginas ?>
        &nbsp;
        <?php if ($pagina > 1) { ?>
            <a href="index.php?pagina=1">&laquo; Primera</a>
            <a href="index.php?pagina=<?= $pagina - 1 ?>">&lsaquo; Anterior</a>
        <?php } else { ?>
            <span class="gris">&laquo; Primera</span>
            <span class="gris">&lsaquo; Anterior</span>
        <?php } ?>
        <?php if ($pagina < $totalPaginas) { ?>
            <a href="index.php?pagina=<?= $pagina + 1 ?>">Siguiente &rsaquo;</a>
            <a href="index.php?pagina=<?= $totalPaginas ?>">Última &raquo;</a>
        <?php } else { ?>
            <span class="gris">Siguiente &rsaquo;</span>
            <span class="gris">Última &raquo;</span>
        <?php } ?>
    </div>
    <br>
    Número de clientes: <?= $total ?>
    <?php $conexion = null; // cerramos la conexión a la BD ?>
</body>

</html>