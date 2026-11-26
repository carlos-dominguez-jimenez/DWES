<?php
require_once 'conexion.php';
/** @var PDO $conexion */

// El tipo y el código llegan por la URL
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : (isset($_GET['tipo']) ? $_GET['tipo'] : "");
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : (isset($_GET['codigo']) ? $_GET['codigo'] : "");

if ($codigo == "" || ($tipo != "entrada" && $tipo != "salida")) {
    header("Location: index.php");
    exit;
}

$mensaje = "";

if (isset($_POST['unidades'])) {
    $unidades = $_POST['unidades'];

    if ($tipo == "entrada") {
        //Entrada de mercancia
        $movimiento = $conexion->prepare("UPDATE articulo SET stock = stock + ? WHERE codigo = ?");
        $movimiento->execute([$unidades, $codigo]);
        $conexion = null;
        header("Location: index.php?msg=" . urlencode("Entrada de $unidades unidades en $codigo registrada."));
        exit;
    } else {
        //Salida de mercancía
        $movimiento = $conexion->prepare("UPDATE articulo SET stock = stock - ? WHERE codigo = ? AND stock >= ?");
        $movimiento->execute([$unidades, $codigo, $unidades]);
        if ($movimiento->rowCount() > 0) {
            $conexion = null;
            header("Location: index.php?msg=" . urlencode("Salida de $unidades unidades de $codigo registrada."));
            exit;
        }
        $mensaje = "NO hay stock suficiente: no se pueden sacar $unidades unidades";
    }
}

//Cargamos el artículo para mostrar su descripcion y su stock
$consulta = $conexion->prepare("SELECT codigo, descripcion, stock FROM articulo WHERE codigo = ?");
$consulta->execute([$codigo]);
$articulo = $consulta->fetchObject();
$conexion = null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Movimiento de mercancía</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>GESTISIMAL</h1>
    <h2><?= $tipo == "entrada" ? "Entrada" : "Salida" ?> de mercancía</h2>

    <?php if ($mensaje != "") { ?>
        <p class="msg-error"><?= htmlspecialchars($mensaje) ?></p>
    <?php } ?>

    <?php if (!$articulo) { ?>
        <p>No existe ningún artículo con ese código.</p>
    <?php } else { ?>
        <p>
            Artículo: <b><?= htmlspecialchars($articulo->codigo) ?></b> - <?= htmlspecialchars($articulo->descripcion) ?><br>
            Stock actual: <b><?= $articulo->stock ?></b>
        </p>
        <form action="movimiento.php" method="post">
            <input type="hidden" name="codigo" value="<?= htmlspecialchars($articulo->codigo) ?>">
            <input type="hidden" name="tipo" value="<?= $tipo ?>">
            Unidades <input type="number" name="unidades" min="1" required>
            <input class="btn azul" type="submit" value="<?= $tipo == "entrada" ? "Registrar entrada" : "Registrar salida" ?>">
        </form>
    <?php } ?>

    <p><a href="index.php">Volver al listado</a></p>
</body>

</html>