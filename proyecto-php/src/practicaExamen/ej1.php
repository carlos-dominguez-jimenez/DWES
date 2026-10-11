<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
function esPrimo(int $num) {
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}
?>
<form action="ej1.php" method="get">
    Inserta el número: <input type="number" name="primo" required>
    <input type="submit" value="Calcular">
</form>

<?php
if (isset($_GET["primo"])) {
    $primo = $_GET["primo"];

    if (esPrimo($primo)) {
        echo "Verdadero";
    } else {
        echo "Falso";
    }
}
?>
</body>
</html>