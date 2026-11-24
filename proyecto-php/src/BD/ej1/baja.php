<?php
require_once 'conexion.php';
/** @var PDO $conexion */

// Realizamos el DELETE del cliente con ese DNI
if (isset($_POST['dni'])) {
    $borrado = $conexion ->prepare("DELETE FROM cliente WHERE dni =?");
    $borrado->execute([$_POST['dni']]);
    header("Location: index.php?msg=Cliente borrado correctamente");
} else {
    header("Location: index.php");
}
exit;
?>