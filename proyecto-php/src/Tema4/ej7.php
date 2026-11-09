<?php
    $color = "#ffffff";

    if (isset($_COOKIE['color'])) {
        $color = $_COOKIE['color'];
    }

    if (isset($_POST['color'])) {
        $color = $_POST['color'];
        setcookie("color", $color, time() + 7*24*60*60);
    }

    if (!preg_match('/^#[0-9a-fA-F]{6}$/', $color)) {
        $color = "#ffffff";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Color de fondo con cookie</title>
</head>
<body style="background-color: <?= $color ?>;">
    <h1>Color de fondo</h1>
    <p>El color elegido se guarda en una cookie, así que seguirá ahí aunque cierres el navegador.</p>
 
    <form action="" method="post">
        Elige un color: <input type="color" name="color" value="<?= $color ?>">
        <input type="submit" value="Cambiar color">
    </form>
</body>
</html>
