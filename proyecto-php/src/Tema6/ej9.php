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

}
?>