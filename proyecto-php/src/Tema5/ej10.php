<?php
$mensaje = "";
$palabras = array();

if (isset($_POST['fichero'])) {
    // basename() evita rutas como ../../etc/passwd
    $nombre = basename(trim($_POST['fichero']));

    if ($nombre == "") {
        $mensaje = "Escribe el nombre del fichero.";
    } elseif (!file_exists($nombre)) {
        $mensaje = "El fichero " . htmlspecialchars($nombre) . " no existe.";
    } else {
        // Leer las palabras (una por línea), sin saltos de línea ni líneas vacías
        $palabras = file($nombre, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $palabras = array_map('trim', $palabras);

        // Ordenar alfabéticamente sin distinguir mayúsculas de minúsculas
        sort($palabras, SORT_FLAG_CASE | SORT_STRING);

        // Nombre del resultado: palabras.txt -> palabras_sort.txt
        $partes = pathinfo($nombre);
        $resultado = $partes['filename'] . "_sort";
        if (isset($partes['extension'])) {
            $resultado .= "." . $partes['extension'];
        }

        if (file_put_contents($resultado, implode("\n", $palabras) . "\n") === false) {
            $mensaje = "No se pudo escribir el fichero " . htmlspecialchars($resultado) . " (revisa los permisos).";
        } else {
            $mensaje = "Fichero creado: " . htmlspecialchars($resultado);
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