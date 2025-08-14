<?php 
    session_start();

    //incorporar función validación 
	require_once "./funciones/alta_persona.php";
    require_once "./funciones/validardatos.php";
    require_once "./funciones/val_nif_dup.php";
    //require_once "./modificacion_persona.php";
    //recupera y guarda las personas del array
    $personas = $_SESSION ['datosPersonas']['personas'] ?? [];
    var_dump($personas);
    //recuperar los datos sin espacios en blanco -trim()-
    $nif = trim(filter_input(INPUT_POST, 'nif'));
    $nombre = trim(filter_input(INPUT_POST, 'nombre'));
    $direccion = trim(filter_input(INPUT_POST, 'direccion'));
    try {
        //validar datos obligatorios
        if (isset($_POST['alta'])){
        alta_persona($nif, $nombre, $direccion);
        //mensaje de alta efectuada
        throw new Exception("Alta efectuadas"); 
        $nif=$nombre=$direccion = null;
        //modificar persona       
    }elseif (isset($_POST['modiPersona'])) {
        //($nif, $nombre, $direccion);
        modificacionPersona($nif,$nombre,$direccion);
        throw new Exception("Modificación realisada");
        
    }

 
    


    } catch (Exception $e) {
        $mensaje = $e->getMessage();
    }

    //compactaremos en un array las variables php que se muestran en el documento HTML y que correspondan a la operativa de alta
    $_SESSION['datosPersonas'] = compact('mensaje','nif', 'nombre', 'direccion');
    //Trasladar el contenido del array $personas a la variable de sesión
    $_SESSION['datosPersonas']['personas'] = $personas;
   
    //Retornar a la página principal
    header("Location: ../personas.php");
    