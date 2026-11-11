<!--Realiza un programa que sea capaz de ordenar alfabéticamente las palabras contenidas en un fichero de texto. El
nombre del fichero que contiene las palabras se debe pasar a través de un formulario. El nombre del fichero
resultado debe ser el mismo que el original añadiendo la coletilla sort, por ejemplo palabras_sort.txt. Suponemos
que cada palabra ocupa una línea.-->

<?php

$mensaje = "";
$palabras = array();

if (isset($_POST['fichero'])) {
    $nombre = basename(trim($_POST['fichero']));

    if ($nombre == "") {
        $mensaje = "Escribe el nombre del frichero";
    } elseif (!file_exists($nombre)) {
        $mensaje = "El fichero " . htmlspecialchars($nombre) . " no existe.";
    } else {
        $palabras = file($nombre, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $palabras = array_map('trim', $palabras);

        sort ($palabras, SORT_FLAG_CASE | SORT_STRING);

        $partes = pathinfo($nombre);
        $resultado = $partes['filename'] . "_sort";
        if (isset($partes['extension'])) {
            $resultado .= "." . $partes['extension'];
        }

        if (file_put_contents($resultado, implode("\n", $palabras) . "\n") === false) {
            $mensaje = "No se pudo escribir el fichero " . htmlspecialchars($resultado);
        } else {
            $mensaje = "ichero creado: " . htmlspecialchars($resultado);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ordenar palabras</title>
</head>
<body>
    <h1>Ordenar palabras de un fichero</h1>

    <form action="" method="post">
        Nombre del fichero: <input type="text" name="fichero" placeholder="palabras.txt">
        <input type="submit" value="Ordenar">
    </form>

    <p><?= $mensaje ?></p>

    <?php if (count($palabras) > 0) { ?>
        <h3>Palabras ordenadas:</h3>
        <?php foreach ($palabras as $palabra) { ?>
            <?= htmlspecialchars($palabra) ?><br>
        <?php } ?>
    <?php } ?>
</body>
</html>