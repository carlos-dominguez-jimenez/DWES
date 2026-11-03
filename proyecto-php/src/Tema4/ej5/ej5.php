<?php
session_start();

$productos = array(
    "pluma" => array(
        "descripcion" => "Pluma estilográfica verde.",
        "precio" => 545,
        "imagen" => "imagenes/pluma.svg"
    ),
    "cuaderno" => array(
        "descripcion" => "Cuaderno tapa dura",
        "precio" => 12,
        "imagen" => "imagenes/cuaderno.svg"
    ),
    "estuche" => array(
        "descripcion" => "Cuaderno de tapa dura",
        "precio" => 10,
        "imagen" => "imagenes/estuche.svg"
    ),
    "tinta" => array(
        "descripcion" => "TIntero azul de 50ml",
        "precio" => 9,
        "imagen" => "imagenes/tinta.svg"
    )
);

//Creamos el carrito vacío
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

//Acciones de los botones comprar y eliminar
if (isset($_POST['accion']) && isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    if (isset($productos[$codigo])) {
        switch ($_POST['accion']) {
            case "comprar":
                if (isset($_SESSION['carrito'][$codigo])) {
                    $_SESSION['carrito'][$codigo]++;
                } else {
                    $_SESSION['carrito'][$codigo]=1;
                }
                break;
            
            case "eliminar":
                unset($_SESSION['carrito'][$codigo]);
                break;
        }
    }
}

//Total del carrito
$total = 0;
foreach ($_SESSION['carrito'] as $codigo => $unidades) {
    $total += $productos[$codigo]['precio'] * $unidades;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
</head>
<body>
    <h1>Tienda - La Papelería</h1>

        <div class="tienda">
        <div class="columna">
            <h2>Productos</h2>
            <hr>
            <?php foreach ($productos as $codigo => $producto) { ?>
                <div class="producto">
                    <img src="<?= $producto['imagen'] ?>" alt="<?= $producto['descripcion'] ?>">
                    <?= $producto['descripcion'] ?><br>
                    Precio: <?= $producto['precio'] ?> €
                    <form action="" method="post">
                        <input type="hidden" name="codigo" value="<?= $codigo ?>">
                        <input type="hidden" name="accion" value="comprar">
                        <input type="submit" value="Comprar">
                    </form>
                </div>
            <?php } ?>
        </div>
 
        <div class="columna">
            <h2>Carrito</h2>
            <hr>
            <?php if (count($_SESSION['carrito']) == 0) { ?>
                <p>El carrito está vacío.</p>
            <?php } else { ?>
                <?php foreach ($_SESSION['carrito'] as $codigo => $unidades) { ?>
                    <div class="producto">
                        <img src="<?= $productos[$codigo]['imagen'] ?>" alt="<?= $productos[$codigo]['descripcion'] ?>">
                        <?= $productos[$codigo]['descripcion'] ?><br>
                        Precio: <?= $productos[$codigo]['precio'] ?> €<br>
                        Unidades: <?= $unidades ?>
                        <form action="" method="post">
                            <input type="hidden" name="codigo" value="<?= $codigo ?>">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="submit" value="Eliminar">
                        </form>
                    </div>
                <?php } ?>
                <p><strong>Total: <?= $total ?> €</strong></p>
            <?php } ?>
        </div>
    </div>

</body>
</html>