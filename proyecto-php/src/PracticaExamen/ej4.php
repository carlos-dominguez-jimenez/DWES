<?php
    if (isset($_GET["tienda1"])){
        $tienda1 = $_GET["tienda1"];
        $tienda2 = $_GET["tienda2"];
        $tienda3 = $_GET["tienda3"]; 
    
    $media = ($tienda1 + $tienda2 + $tienda3)/3
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <table border="1">
            <tr>

                <th>Tienda1</th>
                <th>Tienda2</th>
                <th>Tienda3</th>
                <th>Media</th>
            </tr>

            <tr>

                <td>
                    <?php
                    echo $tienda1;
                    ?>
                </td>
                <td>
                    <?php
                    echo $tienda2;
                    ?>
                </td>
                <td>
                    <?php
                    echo $tienda3;
                    ?>
                </td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <?php
                    echo $media
                    ?>
                </td>
            </tr>
        </table>
</body>
</html>
 

<?php
} else {
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej4.php" method="get">
        Tienda 1: <input type="num" name="tienda1"><br>
        Tienda 2: <input type="num" name="tienda2"><br>
        Tienda 3: <input type="num" name="tienda3"><br>
        <input type="submit" value="calcular">
    </form>

    
</body>
</html>
<?php
}
?>