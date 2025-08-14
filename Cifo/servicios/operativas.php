<?php
    session_start();
    
    //incorporacion de ficheros externos
	require_once './funciones/validardatos.php';
	require_once './funciones/validarNifDuplicado.php';
    require_once './funciones/alta_persona.php';
    require_once './funciones/baja_persona.php';
    require_once './funciones/modificacion_persona.php';

    // Recuperar array de personas
    $personas = $_SESSION['datosPersonas']['personas'] ?? [];
    // Recuperar los datos del formulario
    $nif = trim(filter_input(INPUT_POST, "nif"));
	$nombre = addslashes(trim(filter_input(INPUT_POST, "nombre")));
	$direccion = trim(filter_input(INPUT_POST, "direccion"));
    
   
    // Evaluar la  petición
    try {
        if (isset($_POST['alta'])){
            // Alta de la persona
            altaPersona($nif, $nombre, $direccion);
            $mensaje = 'Alta de persona efectuada';
            $nif = $nombre = $direccion = null;
        }
        else if (isset($_POST['formularioModi'])){
            //recuperar los datos del formularioModi
            $nif = trim(filter_input(INPUT_POST, "nifModi"));
            $nombre = addslashes(trim(filter_input(INPUT_POST, "nombreModi")));
            $direccion = trim(filter_input(INPUT_POST, "direccionModi"));
		    
            // Modificacion de la persona
            modificacionPersona($nif, $nombre, $direccion);
            $mensaje = 'Modificación efectuada';
            
        }
        else if (isset($_POST['formularioBaja'])){
            //recupera dato del formulario
            $nif = trim(filter_input(INPUT_POST, "nifBaja"));
            // Baja de la persona
            bajaPersona($nif);
            throw new Exception("Baja efectuada con exito");
            
        }
        
    } catch (Exception $error) {
        $mensaje = $error->getMessage();
    }

    // guardar los datos que se necesita para el formulario
    $_SESSION['datosPersonas'] = compact('mensaje');
    
    // Guardamos el array de personas en ela variable de persoans
    $_SESSION['datosPersonas']['personas'] = $personas;
    
   
    // Retornar a la pagina principal con la consulta
    header("Location: ../personas.php");