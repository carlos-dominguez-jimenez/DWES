<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <?php
        function esPrimo ($num) {
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

    <form action="ej1.2.php" method="get">
        Número primo: <input type="number" name="primo">
        <input type="submit" value="Hallar">
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