<?php 
require_once('validacion.php');


//calcular solicitud
function calcularPrecio($noches, $ciudad, $coche){

	validar($noches, $ciudad,$coche);
	
	// Alqiler de coche
	if ($coche > 0){
		$lloguer = $coche * ALQUILER_COCHE;
	}
	
	if($coche >= 3 && $coche <=6){
		$lloguer =$lloguer - DESCUENTO_20;
	}
	
	if($coche >=7){
		$lloguer = $lloguer - DESCUENTO_50;

	}
	// Destino
	if($ciudad == 'Madrid'){
		$precio = PRECIO_MADRID;
	}
	if($ciudad == 'Paris'){
		$precio = PRECIO_PARIS;
	}
	if($ciudad == 'Los Angeles'){
		$precio = PRECIO_LOS_ANGELES;
	}
	if($ciudad == 'Roma'){
		$precio = PRECIO_ROMA;
	}
	// Precio segun consulta
	$precio = $precio * $noches;

	if ($coche > 0){
		$precio = $precio + $lloguer;
	}
	return  $precio;
}
?>