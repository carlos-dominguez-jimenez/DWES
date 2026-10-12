<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <?php
        function esPrimo (int $numero) {
            if ($numero < 2){
                return false;
            }

            for ($i = 2; $i * $i <=$numero; $i++) {
                if ($numero % $i == 0) {
                    return false;
                }
            }
            return true;
        }
    ?>

    <form action="ej1.1.php" method="get">
        Numero: <input type="number" name="numero">
        <input type="submit" value="Hallar">
    </form>

    <?php
        if (isset($_GET["numero"])){
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