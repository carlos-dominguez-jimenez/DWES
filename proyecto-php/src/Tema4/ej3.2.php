<?php
    session_start();

    if (!isset($_SESSION['suma'])) {
        $_SESSION['suma'] = 0;
        $_SESSION['cantidad'] = 0;
    }

    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];

        $_SESSION['suma'] += $numero;
        $_SESSION['cantidad']++;

        if ($_SESSION['suma'] > 10000) {
            echo "El total es: " . $_SESSION['suma'] . "<br>";
            echo "La cantidad de números introducidos es: " . $_SESSION['cantidad'] . "<br>";
            echo "La media es; " . $_SESSION['suma'] / $_SESSION['cantidad'];

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
    <form action="ej3.1.php" method="post">
        Introduce un número: <input type="number" name="numero">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>