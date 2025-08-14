<?php 

function validar($noches, $ciudad, $coche){
   
    if(empty($noches)|| !is_numeric($noches) || $noches < 0){
        throw new Exception( 'Selecciones Noches');
    }
    if(empty($ciudad)){
        throw new Exception(('Seleccione un Destino'));
    }
    if((!is_numeric($coche))|| $coche > $noches || $coche < 0){
        throw new Exception('El número de días de alquiler no puede exceder el número de días de estancia en el hotel');
    }   
  
}

?>