<?php 

session_start();

require_once('./funciones/calcularServicio.php');

// Costo del vuelo precios 
const PRECIO_MADRID = 150;
const PRECIO_PARIS = 250;
const PRECIO_LOS_ANGELES = 450;
const PRECIO_ROMA = 200;
// Coste de alquiler de cohe
const ALQUILER_COCHE = 40;
// Descuento
const DESCUENTO_20 = 20;
const DESCUENTO_50 = 50;

$_SESSION['precio'] = [
    'PRECIO_MADRID' => PRECIO_MADRID,
    'PRECIO_PARIS' => PRECIO_PARIS,
    'PRECIO_LOS_ANGELES' => PRECIO_LOS_ANGELES,
    'PRECIO_ROMA' => PRECIO_ROMA,
];

// Recuperación de datos del formulario
$noches = filter_input(INPUT_POST, 'noches', FILTER_VALIDATE_INT);
$ciudad = filter_input(INPUT_POST, 'ciudad');
$coche = filter_input(INPUT_POST, 'coche', FILTER_VALIDATE_INT); 
try {
    if (isset($_POST['enviar'])) {
        $total = calcularPrecio($noches, $ciudad, $coche);
    }
}catch (Exception $e){
    $error = $e->getMessage();
}

$_SESSION['datos'] = compact('noches', 'ciudad', 'coche', 'total', 'error');    

// Retornar a la página principal
header("Location: ../PLA02_Coste_Hotel.php");
?>

