<?php
    session_start();

    if (!isset($_SESSION['suma'])) {
        $_SESSION['suma'] = 0;
        $_SESSION['cantidad'] = 0;
        $_SESSION['cantidadTotal'] = 0;
        $_SESSION['mayorPar'] = 0;
    }

    $mensaje = '';
    $terminado = false;
    $media = 0;

    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];

        if ($numero >= 0) {
            $_SESSION['cantidadTotal']++;

            if ($numero % 2 != 0) {
                $_SESSION['suma'] += $numero;
                $_SESSION['cantidad']++;
            } else {
                if ($numero > $_SESSION['mayorPar']) {
                    $_SESSION['mayorPar'] = $numero;
                }
            }

        } else {
            if ($_SESSION['cantidad'] > 0) {
                echo "La cantidad de números introducidos es: " . $_SESSION['cantidadTotal'] . "<br>";

                if ($_SESSION['cantidad'] > 0) {
                    echo "La media de impares es: " . $_SESSION['suma'] / $_SESSION['cantidad'] . "<br>";
                } else {
                    echo "No se han introducido números impares.<br>";
                }

                if ($_SESSION['mayorPar'] != 0) {
                    echo "El mayor de los pares es: " . $_SESSION['mayorPar'] . "<br>";
                } else {
                    echo "No se han introducido números pares. <br>";
                }

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
    <form action="ej2.php" method="post">
        Introduce el número: <input type="number" name="numero">
        <input type="submit" value="Media">
    </form>
</body>
</html>