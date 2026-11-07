<?php
session_start();

// Cerrar sesión
if (isset($_POST['cerrar'])) {
    session_destroy();
    header("refresh: 0;"); // refresca la página, necesario después de destruir la sesión
}

// Control de acceso: comprobar usuario y contraseña
if (isset($_POST['user'])) {
    if ($_POST['user'] == "admin" && $_POST['pass'] == "1234") {
        $_SESSION['user'] = $_POST['user'];
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}

$mensaje = "";

if (isset($_SESSION['user'])) {
    if (!isset($_SESSION['suma'])) {
        $_SESSION['suma'] = 0;
        $_SESSION['cantidad'] = 0;
    }

    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];

        if ($numero >= 0) {
            $_SESSION['suma'] += $numero;
            $_SESSION['cantidad']++;
        } else {
            if ($_SESSION['cantidad'] > 0) {
                $mensaje = "La media es: " . $_SESSION['suma'] / $_SESSION['cantidad'];
            } else {
                $mensaje = "No se han introducido números positivos.";
            }
            // No se usa session_destroy() porque cerraría también el login
            unset($_SESSION['suma']);
            unset($_SESSION['cantidad']);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 con login</title>
</head>
<body>
    <?php if (!isset($_SESSION['user'])) { ?>

        <h3>IDENTIFIQUESE</h3>
        <p style="color:red;"><?= $error ?></p>
        <form action="" method="post">
            Usuario: <input type="text" name="user"><br><br>
            Contraseña: <input type="password" name="pass"><br><br>
            <input type="submit" value="Entrar">
        </form>

    <?php } else { ?>

        <h3>Bienvenido, <?= $_SESSION['user'] ?></h3>
        <p><?= $mensaje ?></p>
        <form action="" method="post">
            Introduce el número: <input type="number" name="numero">
            <input type="submit" value="Enviar">
        </form>
        <br>
        <form action="" method="post">
            <input type="submit" value="Cerrar sesión" name="cerrar">
        </form>

    <?php } ?>
</body>
</html>