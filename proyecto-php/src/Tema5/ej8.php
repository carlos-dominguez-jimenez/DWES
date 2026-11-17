<?php
class DadoPoker {
    // Figuras de las caras del dado
    private static $figuras = array("As", "K", "Q", "J", "7", "8");

    // Atributo de clase: tiradas totales entre todos los dados
    private static $tiradasTotales = 0;

    // Valor de la última tirada (posición en el array de figuras)
    private $valor = null;

    // Tira el dado: genera un valor aleatorio para este objeto
    public function tira() {
        $this->valor = rand(0, 5);
        self::$tiradasTotales++;
    }

    // Figura que salió en la última tirada
    public function nombreFigura() {
        if ($this->valor === null) {
            return "sin tirar";
        }
        return self::$figuras[$this->valor];
    }

    // Número total de tiradas entre todos los dados
    public static function getTiradasTotales() {
        return self::$tiradasTotales;
    }
}

// Cubilete con cinco dados
$dados = array();
if (isset($_POST['tirar'])) {
    for ($i = 0; $i < 5; $i++) {
        $dados[$i] = new DadoPoker();
        $dados[$i]->tira();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dados de póker</title>
</head>
<body>
    <h1>Cubilete de dados de póker</h1>

    <form action="" method="post">
        <input type="submit" name="tirar" value="Tirar cubilete">
    </form>

    <?php if (count($dados) > 0) { ?>
        <h3>Resultado de la tirada:</h3>
        <table border="1">
            <tr><th>Dado</th><th>Figura</th></tr>
            <?php foreach ($dados as $i => $dado) { ?>
                <tr><td><?= $i + 1 ?></td><td><?= $dado->nombreFigura() ?></td></tr>
            <?php } ?>
        </table>
        <p>Tiradas totales: <?= DadoPoker::getTiradasTotales() ?></p>
    <?php } ?>
</body>
</html>