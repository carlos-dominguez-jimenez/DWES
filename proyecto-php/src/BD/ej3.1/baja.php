<?php
require_once 'conexion.php';
/** @var PDO $conexion */

if (isset($_POST['codigo'])) {
    $borrado = $conexion->prepare("DELETE FROM articulo WHERE codigo = ?");
    $borrado->execute([$_POST['codigo']]);
    $conexion = null;
    header("Location: index.php?msg=" . urlencode("Artículo " . $_POST['codigo'] . " eliminado correctamente."));
} else {
    header("Location: index.php");
}
exit;
?>