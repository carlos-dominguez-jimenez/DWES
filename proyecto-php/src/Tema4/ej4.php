<?php
session_start();

$error = "";

// Cerrar sesión
if (isset($_POST['cerrar'])) {
    session_destroy();
    header("Location: ej1.php");
    exit;
}

// Comprobar el login
if (isset($_POST['usuario'])) {
    if ($_POST['usuario'] == "admin" && $_POST['clave'] == "1234") {
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: ej1.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}

// Ejercicio 1: solo si hay sesión iniciada
if (isset($_SESSION['usuario'])) {
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
                echo "La media es: " . $_SESSION['suma'] / $_SESSION['cantidad'] . "<br>";
            } else {
                echo "No se han introducido números positivos.<br>";
            }
            // No usamos session_destroy() porque cerraría también el login
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
</head>
<body>
<?php if (!isset($_SESSION['usuario'])) { ?>

    <h1>Iniciar sesión</h1>

    <?php
    if ($error != "") {
        echo "<p style='color:red;'>" . $error . "</p>";
    }
    ?>

    <form action="ej1.php" method="post">
        Usuario: <input type="text" name="usuario"><br><br>
        Contraseña: <input type="password" name="clave"><br><br>
        <input type="submit" value="Entrar">
    </form>

<?php } else { ?>

    <p>Usuario: <?php echo $_SESSION['usuario']; ?></p>

    <form action="ej4.php" method="post">
        Introduce el número: <input type="number" name="numero">
        <input type="submit" value="Enviar">
    </form>

    <br>

    <form action="ej4.php" method="post">
        <input type="submit" name="cerrar" value="Cerrar sesión">
    </form>

<?php } ?>
</body>
</html>