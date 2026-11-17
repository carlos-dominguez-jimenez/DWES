<?php
require_once 'conexion.php';

$mensaje = "";

if (isset($_POST['dni'])) {
    $consulta = $conexion->prepare("SELECT dni FROM cliente WHERE dni = ?");

}