<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        $euros = 0.01;
        $pesetas = 10000;
        $conversion = $pesetas * $euros;

        echo "Conversor de Pesetas a Euros" . "<br>";
        echo "Usted tiene: " . $conversion . " euros" . "<br>";
    ?>
</body>
</html>
