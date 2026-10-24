<?php
session_start();
 
// 1) Array de productos en la sesión
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [
        'raton'    => ['precio' => 6,  'detalle' => 'Ratón óptico con 3 botones y cable USB.'],
        'teclado'  => ['precio' => 11, 'detalle' => 'Teclado gaming con teclas iluminadas en rojo.'],
        'monitor'  => ['precio' => 80, 'detalle' => 'Monitor de 24 pulgadas Full HD con entrada HDMI.'],
        'joystick' => ['precio' => 33, 'detalle' => 'Mando de juego con 12 botones y cable de 2 metros.'],
    ];
}
 
// 2) La cesta: si no existe en la sesión, se recupera de la cookie
if (!isset($_SESSION['cesta'])) {
    $_SESSION['cesta'] = [];
    if (isset($_COOKIE['cesta'])) {
        $guardada = json_decode($_COOKIE['cesta'], true);
        if (is_array($guardada)) {
            foreach ($guardada as $nombre => $cantidad) {
                if (isset($_SESSION['productos'][$nombre]) && $cantidad > 0) {
                    $_SESSION['cesta'][$nombre] = (int)$cantidad;
                }
            }
        }
    }
}
 
// 3) Acciones: comprar, eliminar y vaciar
$accion   = isset($_GET['accion'])   ? $_GET['accion']   : '';
$producto = isset($_GET['producto']) ? $_GET['producto'] : '';
$destino  = 'tienda.php';
 
if ($accion == 'comprar' && isset($_SESSION['productos'][$producto])) {
    if (isset($_SESSION['cesta'][$producto])) {
        $_SESSION['cesta'][$producto]++;          // ya estaba: sumamos 1
    } else {
        $_SESSION['cesta'][$producto] = 1;        // primera vez
    }
}
 
if ($accion == 'eliminar' && isset($_SESSION['cesta'][$producto])) {
    $_SESSION['cesta'][$producto]--;              // quitamos 1 unidad
    if ($_SESSION['cesta'][$producto] == 0) {
        unset($_SESSION['cesta'][$producto]);     // si llega a 0, se quita el producto
    }
    $destino = 'tienda.php?ver=cesta';
}
 
if ($accion == 'vaciar') {
    $_SESSION['cesta'] = [];
    $destino = 'tienda.php?ver=cesta';
}
 
// Si hubo alguna acción: guardamos la cesta en la cookie y recargamos la página
if ($accion != '') {
    setcookie('cesta', json_encode($_SESSION['cesta']), time() + 60 * 60 * 24 * 30);
    header('Location: ' . $destino);
    exit;
}
 
// 4) Qué parte de la página se muestra: tienda, cesta o detalle
$ver = isset($_GET['ver']) ? $_GET['ver'] : 'tienda';
$totalUnidades = array_sum($_SESSION['cesta']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>La tiendecita</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 420px; margin: 20px auto;
                box-shadow: 4px 4px 8px #999; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; font-size: 14px; }
        th { background: #708090; color: white; }
        .titulo { font-size: 16px; }
        .cesta, .rojo { color: #ff6b6b; font-weight: bold; text-decoration: none; }
        .boton { border: 1px solid #888; background: #eee; padding: 2px 8px;
                 font-size: 13px; color: black; text-decoration: none; }
        img { width: 80px; }
        .grande { width: 250px; }
        .centro { width: 420px; margin: 0 auto; text-align: center; }
    </style>
</head>
<body>
 
<?php if ($ver == 'cesta') { ?>
 
    <!-- ===== PÁGINA DE LA CESTA ===== -->
    <table>
        <tr>
            <th colspan="4" class="rojo">PRODUCTOS EN TU CESTA</th>
        </tr>
        <?php
        $totalEuros = 0;
        foreach ($_SESSION['cesta'] as $nombre => $cantidad) {
            $precio = $_SESSION['productos'][$nombre]['precio'];
            $totalEuros = $totalEuros + $precio * $cantidad;
        ?>
        <tr>
            <td><?php echo $nombre; ?></td>
            <td><?php echo $cantidad; ?></td>
            <td>
                <img src="img/<?php echo $nombre; ?>.png"><br>
                <?php echo $nombre; ?><br>
                <?php echo $precio; ?> euros
            </td>
            <td><a class="boton" href="tienda.php?accion=eliminar&producto=<?php echo $nombre; ?>">Eliminar</a></td>
        </tr>
        <?php } ?>
        <tr>
            <td>Total</td>
            <td><?php echo $totalUnidades; ?></td>
            <td><?php echo $totalEuros; ?></td>
            <td><a href="tienda.php?accion=vaciar">VACIAR CESTA</a></td>
        </tr>
    </table>
    <div class="centro">
        <a class="boton" href="tienda.php">Volver a la tienda</a>
    </div>
 
<?php } elseif ($ver == 'detalle' && isset($_SESSION['productos'][$producto])) { ?>
 
    <!-- ===== PÁGINA DE DETALLE ===== -->
    <div class="centro">
        <img class="grande" src="img/<?php echo $producto; ?>.png"><br>
        <strong><?php echo $producto; ?></strong><br>
        <?php echo $_SESSION['productos'][$producto]['precio']; ?> euros
        <p><?php echo $_SESSION['productos'][$producto]['detalle']; ?></p>
        <a class="boton" href="tienda.php">Volver a la tienda</a>
    </div>
 
<?php } else { ?>
 
    <!-- ===== PÁGINA PRINCIPAL ===== -->
    <table>
        <tr>
            <th colspan="3" class="titulo">La tiendecita</th>
            <th><a class="cesta" href="tienda.php?ver=cesta">CESTA<br><?php echo $totalUnidades; ?>Prod</a></th>
        </tr>
        <tr>
            <th class="rojo">Producto</th>
            <th class="rojo">Precio</th>
            <th class="rojo">Imagen</th>
            <th></th>
        </tr>
        <?php foreach ($_SESSION['productos'] as $nombre => $datos) { ?>
        <tr>
            <td><?php echo $nombre; ?></td>
            <td><?php echo $datos['precio']; ?></td>
            <td>
                <a href="tienda.php?ver=detalle&producto=<?php echo $nombre; ?>">
                    <img src="img/<?php echo $nombre; ?>.png">
                </a>
            </td>
            <td><a class="boton" href="tienda.php?accion=comprar&producto=<?php echo $nombre; ?>">Comprar</a></td>
        </tr>
        <?php } ?>
    </table>
 
<?php } ?>
 
</body>
</html>
