<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <?php
        function esPrimo($numero) {
            if ($numero < 2) {
                return false;
            }
            
            for ($i = 2; $i * $i<= $numero; $i++) {
                    if ($numero % $i == 0) {
                        return false;
                    }
                }
                return true;
            }

            
    ?>
    <form action="ej1.3.php" method="get">
        Introduce el número: <input type="number" name="numero">
        <input type="submit" value="Calcular">
    </form>

    <?php
        if (isset($_GET["numero"])) {
            $num = $_GET["numero"];

            if (esPrimo($num)) {
                echo "Verdadero";
            } else {
                echo "Falso";
            }
        }
    ?>
</body>
</html>