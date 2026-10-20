<?php
    session_start();

    if (!isset($_SESSION['suma'])) {
        $_SESSION['suma'] = 0;
        $_SESSION['cantidad'] = 0;
    }

    $mensaje = '';
    $terminado = false;
    $media = 0;

    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];

        if ($numero >= 0) {
            $_SESSION['suma'] += $numero;
            $_SESSION['cantidad']++;

        } else {
            if ($_SESSION['cantidad'] > 0) {
                echo "La media es: " . $_SESSION['suma'] / $_SESSION['cantidad'];
            }
            session_destroy();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej1.php" method="post">
        Introduce el número: <input type="number" name="numero">
        <input type="submit" value="Media">
    </form>
</body>
</html>