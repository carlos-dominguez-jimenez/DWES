<?php
require_once 'conexion.php'; //conexión a la base de datos
/** @var PDO $conexion */

//Paginacion: 5 artículos por página
$porPagina = 5;
$total = $conexion->query("SELECT COUNT(*) FROM articulo")->fetchColumn();
$totalPaginas = max(1, (int) ceil($total / $porPagina));

$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
if ($pagina < 1) {
    $pagina = 1;
}
if ($pagina > $totalPaginas) {
    $pagina = $totalPaginas;
}
$inicio = ($pagina - 1) * $porPagina;

$consulta = $conexion->query("SELECT codigo, descripcion, precio_compra, precio_venta, stock FROM articulo ORDER BY codigo LIMIT $inicio, $porPagina");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>GESTISIMAL</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>GESTISIMAL</h1>

    <?php if (isset($_GET['msg'])) { ?>
        <p class="msg-ok"><?= htmlspecialchars($_GET['msg']) ?></p>
    <?php } ?>
    <?php if (isset($_GET['error'])) { ?>
        <p class="msg-error"><?= htmlspecialchars($_GET['error']) ?></p>
    <?php } ?>

    <!-- Formulario de alta: los campos de la última fila apuntan a él con form="nuevo" -->
    <form id="nuevo" action="alta.php" method="post"></form>

    <table border="1">
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Stock</th>
            <th colspan="4"></th>
        </tr>
        <?php while ($articulo = $consulta->fetchObject()) { ?>
            <tr>
                <td><?= htmlspecialchars($articulo->codigo) ?></td>
                <td><?= htmlspecialchars($articulo->descripcion) ?></td>
                <td><?= number_format($articulo->precio_compra, 2) ?></td>
                <td><?= number_format($articulo->precio_venta, 2) ?></td>
                <td><?= $articulo->stock ?></td>
                <td>
                    <form class="inline" action="baja.php" method="post"
                        onsubmit="return confirm('¿Eliminar el artículo <?= htmlspecialchars($articulo->codigo) ?>?')">
                        <input type="hidden" name="codigo" value="<?= htmlspecialchars($articulo->codigo) ?>">
                        <input class="btn rojo" type="submit" value="Eliminar">
                    </form>
                </td>
                <td><a class="btn amarillo" href="modificar.php?codigo=<?= urlencode($articulo->codigo) ?>">Modificar</a></td>
                <td><a class="btn azul" href="movimiento.php?tipo=entrada&codigo=<?= urlencode($articulo->codigo) ?>">Entrada</a></td>
                <td><a class="btn azul" href="movimiento.php?tipo=salida&codigo=<?= urlencode($articulo->codigo) ?>">Salida</a></td>
            </tr>
        <?php } ?>
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

    <table>
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Stock</th>
            <th></th>
        </tr>
        <tr>
            <td><input form="nuevo" type="text" name="codigo" maxlength="10" required></td>
            <td><input form="nuevo" type="text" name="descripcion" maxlength="100" required></td>
            <td><input form="nuevo" type="number" name="precio_compra" step="0.01" min="0" required></td>
            <td><input form="nuevo" type="number" name="precio_venta" step="0.01" min="0" required></td>
            <td><input form="nuevo" type="number" name="stock" min="0" value="0" required></td>
            <td><input form="nuevo" class="btn verde" type="submit" value="Nuevo artículo"></td>
        </tr>
    </table>
    <?php $conexion = null; // cerramos la conexión a la BD 
    ?>
</body>

</html>