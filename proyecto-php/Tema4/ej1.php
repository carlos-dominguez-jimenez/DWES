<?php
    session_start();

    if (!isset($_SESSION['suma'])) {
        $_SESSION['suma'] = 0;
        
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form action="ej1.php" method="get">
        Introduce el número: <input type="number" name="numero">
        <input type="submit" value="Media">
    </form>
</body>
</html>