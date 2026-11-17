<?php
Class Coche {
    private $matricula;
    private $modelo;
    private $precio;

    //Atributos de la clase
    private static $modeloCaro = "";
    private static $precioCaro = 0;

    public function __construct($matricula, $modelo, $precio) {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->precio = $precio;
        self::comprobarMasCaro($modelo, $precio);
    }

    //Si el coche es más caro que el actual, pasa a ser el más caro
    protected static function comprobarMasCaro($modelo, $precio) {
        if ($precio > self:: $precioCaro) {
            self::$precioCaro = $precio;
            self::$modeloCaro = $modelo;
        }
    }

    public function getMatricula() {
        return $this->matricula;
    }

        public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }
 
    public function getModelo() {
        return $this->modelo;
    }
 
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
 
    public function getPrecio() {
        return $this->precio;
    }
 
    public function setPrecio($precio) {
        $this->precio = $precio;
        self::comprobarMasCaro($this->modelo, $precio);
    }

    //Fila de tabla con los datos del coche

    public function __toString()
    {
        return "<tr><td>" . htmlspecialchars($this->matricula) . "</td><td>" . htmlspecialchars($this->modelo) . "</td><td>" . $this->getPrecio() . " $</td><td>No procede</td></tr>";
    }

    public static function masCaro() {
        return self::$modeloCaro . "-" . self::$precioCaro . " $";
    }
}

class CocheLujo extends Coche {
    private $suplemento;

    public function __construct($matricula, $modelo, $precio, $suplemento) {
        parent::__construct($matricula, $modelo, $precio);
        $this->suplemento = $suplemento;
    }

    public function getSuplemento() {
        return $this->suplemento;
    }

    public function setSuplemento($suplemento) {
        $this->suplemento = $suplemento;
    }

    //EL precio incluye el suplemento
    #[Override]
    public function getPrecio()
    {
        return parent::getPrecio() + $this->suplemento;
    }

    // Fila de tabla con la columna del suplemento
    public function __toString()
    {
        return "<tr><td>" . htmlspecialchars($this->getMatricula()) . "</td><td>" . htmlspecialchars($this->getModelo()) . "</td><td>" . $this->getPrecio() . "$</td><td>" . $this->suplemento . " $</td></tr>";
    }
}

//Coches que ya existen
$coches = array();
$coches[] = new Coche("1234ABC", "Seat Ibiza", 15000);
$coches[] = new Coche("5678DEF", "Renault Clio", 14000);
$coches[] = new CocheLujo("9012GHI", "BMW Serie 5", 45000, 500);

//Coche nuevo del formulario
if (isset($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $suplemento = $_POST['suplemento'];

    if ($suplemento == "") {
        $coches[] = new Coche($matricula, $modelo, $precio);
    } else {
        $coches[] = new CocheLujo($matricula, $modelo, $precio, $suplemento);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Coches</title>
</head>
<body>
    <h1>Coches</h1>
    <h3>Coche más caro: <?= htmlspecialchars(Coche::masCaro()) ?></h3>
 
    <h2>Nuevo coche</h2>
    <form action="" method="post">
        Matrícula: <input type="text" name="matricula"><br><br>
        Modelo: <input type="text" name="modelo"><br><br>
        Precio: <input type="number" name="precio"><br><br>
        Suplemento: <input type="number" name="suplemento"> (solo coches de lujo)<br><br>
        <input type="submit" value="Crear coche">
    </form>
 
    <h2>Listado</h2>
    <table border="1">
        <tr><th>Matrícula</th><th>Modelo</th><th>Precio</th><th>Suplemento</th></tr>
        <?php foreach ($coches as $coche) { ?>
            <?= $coche ?>
        <?php } ?>
    </table>
</body>
</html>
