<?php
session_start();

// 1. Restaurar de la cookie o inicializar a 0
if (!isset($_SESSION['si'])) {
    if (isset($_COOKIE['votos_si']) && isset($_COOKIE['votos_no'])) {
        $_SESSION['si'] = $_COOKIE['votos_si'];
        $_SESSION['no'] = $_COOKIE['votos_no'];
    } else {
        $_SESSION['si'] = 0;
        $_SESSION['no'] = 0;
    }
}

// 2. Procesar el voto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn_si'])) {
        $_SESSION['si']++;
    } elseif (isset($_POST['btn_no'])) {
        $_SESSION['no']++;
    }

    // 3. Guardar en cookies para 3 meses (90 días)
    $expira = time() + (90 * 24 * 60 * 60);
    setcookie('votos_si', $_SESSION['si'], $expira);
    setcookie('votos_no', $_SESSION['no'], $expira);

    // Recargar para evitar que al pulsar F5 se vuelva a enviar el voto
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Encuesta Simple</title>
</head>
<body>

    <h1>¿Vas a aprobar 2º de DAW?</h1>

    <p>SI: <?php for ($i = 0; $i < $_SESSION['si']; $i++) {echo '|';} ?></p>
    <p>NO: <?php for ($j = 0; $j < $_SESSION['no']; $j++) {echo '|';} ?></p>

    <form method="post">
        <button type="submit" name="btn_si">SI</button>
        <button type="submit" name="btn_no">NO</button>
    </form>

</body>
</html>