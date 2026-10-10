<?php
if (isset($_GET["fondo"])) {
 $fondo = $_GET["fondo"];
 $colortexto = $_GET["colortexto"];
 $colortitulo = $_GET["colortitulo"];
 $letra = $_GET["letra"];
 $tamano = $_GET["tamano"];
 $alineacion = $_GET["alineacion"];
 $banner = $_GET["banner"];
 
 if (isset($_GET["negrita"])) {
 $peso = "bold";
 } else {
 $peso = "normal";
 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>Página personalizada</title>
 <style>
 body {
 background-color: <?php echo $fondo; ?>;
 color: <?php echo $colortexto; ?>;
 font-family: '<?php echo $letra; ?>';
 font-size: <?php echo $tamano; ?>px;
 text-align: <?php echo $alineacion; ?>;
 font-weight: <?php echo $peso; ?>;
 }
 h1 {
 color: <?php echo $colortitulo; ?>;
 }
 img {
 width: 100%;
 height: 200px;
 }
 </style>
</head>
<body>
 <img src="<?php echo $banner; ?>" alt="Banner">
 
 <h1>Curso de desarrollo web</h1>
 
 <p>
 Aprende a crear páginas web desde cero: HTML, CSS, JavaScript y PHP.
 Un curso práctico, paso a paso y con ejercicios en cada unidad.
 </p>
 
 <h2>¿Qué vas a aprender?</h2>
 <p>
 A maquetar con HTML y CSS, a programar la parte del cliente con JavaScript
 y a crear páginas dinámicas con PHP.
 </p>
 
 <p><a href="ej3.php">Volver a configurar</a></p>
</body>
</html>
<?php
} else {
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>Configurar página</title>
</head>
<body>
 <h1>Configura el aspecto de la página</h1>
 
 <form action="ej3.php" method="get">
 Color de fondo:
 <input type="color" name="fondo" value="#ffffff"><br><br>
 
 Color del texto:
 <input type="color" name="colortexto" value="#000000"><br><br>
 
 Color del título:
 <input type="color" name="colortitulo" value="#1a4f8b"><br><br>
 
 Tipo de letra:
 <select name="letra">
 <option value="Arial">Arial</option>
 <option value="Verdana">Verdana</option>
 <option value="Times New Roman">Times New Roman</option>
 <option value="Courier New">Courier New</option>
 <option value="Georgia">Georgia</option>
 </select><br><br>
 
 Tamaño de letra (px):
 <input type="number" name="tamano" min="10" max="40" value="16"><br><br>
 
 Alineación del texto:
 <input type="radio" name="alineacion" value="left" checked> Izquierda
 <input type="radio" name="alineacion" value="center"> Centro
 <input type="radio" name="alineacion" value="right"> Derecha<br><br>
 
 Imagen del banner:
 <input type="radio" name="banner" value="banner1.png" checked> Banner 1
 <input type="radio" name="banner" value="banner2.png"> Banner 2
 <input type="radio" name="banner" value="banner3.png"> Banner 3<br><br>
 
 <input type="checkbox" name="negrita"> Texto en negrita<br><br>
 
 <input type="submit" value="Ver página">
 </form>
</body>
</html>
<?php
}
?>