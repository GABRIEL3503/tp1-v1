<?php
include_once __DIR__ . '/../../util/funciones.php';
include_once __DIR__ . '/../../controller/Cine.php';

$datos = data_submitted();

$objCine = new Cine();
$precio  = $objCine->calcularPrecio($datos);

if ($precio !== false) {
    // Pasamos el precio y la condición para mostrar contexto en el resultado
    $esEstudiante = isset($datos['estudiante']) ? 1 : 0;
    $edad         = (int) $datos['edad'];

    header(
        "Location: ../pages/resultado8.php" .
        "?precio=" . urlencode($precio) .
        "&edad="   . urlencode($edad) .
        "&est="    . urlencode($esEstudiante)
       // Si el precio es válido arma la URL con tres parámetros y redirige a resultado8.php:
    );
    exit;
} else {
    // Datos inválidos: volvemos con un código de error
    header("Location: ../pages/ejercicio8.php?error=1");
    exit;
}
