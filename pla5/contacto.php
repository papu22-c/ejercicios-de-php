<?php
// Inicio de sesión
session_start();
// VER ERRORES EN DESARROLLO
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Inicializa la sesión SOLO si no existe 
if (!isset($_SESSION['correos'])) {
    $_SESSION['correos'] = [];
}
$correos_enviados = $_SESSION['correos']['correos_enviados'] ?? [];

// Carga dependencia y bibliotecas externas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php_mailer/src/Exception.php';
require 'php_mailer/src/PHPMailer.php';
require 'php_mailer/src/SMTP.php';

include_once './funciones/funciones.php';
include_once './funciones/validarDatos.php';
include_once './funciones/validarFichero.php';



// Definir constantes
const CHAR_CODE = "A1B2C3D4E5F6G7H8I9J0K1L2M3N4O5P6Q7R8S9T0U1V2W3X4Z5";

// Carpeta donde se guardan los archivos subidos
$nombre   = '';
$email    = '';
$mensaje  = '';
$telefono = '';
$consulta = '';
$error    = ''; 

$tamañoMaximo = 10000000;
$destinoServidor = __DIR__ . '/archivos/';


try {
    // Comprobar si se ha pulsado el botón de enviar 
    if (isset($_POST['enviar'])) {
        // Recuperar variables del formulario 
        $nombre   = trim((string)filter_input(INPUT_POST, 'nombre'));
        $email    = trim((string)filter_input(INPUT_POST, 'email'));
        $mensaje  = trim((string)filter_input(INPUT_POST, 'mensaje'));
        $telefono = trim((string)filter_input(INPUT_POST, 'telefono'));
        // Validar (asumiendo que validar_datos() devuelve TRUE cuando es válido)
        if (!validar_datos($nombre, $email, $mensaje, $telefono)) {
        }
        // Confección del mensage remplazando los saltos  de lineas por <br>
        
        $mensaje_con_br = str_replace("\n","<br>",$mensaje);


        if($_FILES['fichero']['error']==0){  // El código 0 indica que se ha  subido un fichero
            // Recuperamos datos  del fichero
            $nombreFichero = $_FILES['fichero']['name'];
            $tipoFichero = $_FILES['fichero']['type'];
            $tamañoFichero = $_FILES['fichero']['size'];
            $tmpFichero = $_FILES['fichero']['tmp_name']; // Nombre  temporal que pone php a los archivos en cahé
            

            // Comprovar que el archivo no sea demaciado grande
            if($tamañoFichero > $tamañoMaximo){
                throw new Exception("El  archivo  es demaciado grande");
            }
            if (!stripos($tipoFichero,"pdf")) {// Busca una coincidencia  en el string 
                throw new Exception("Solo se admite PDF");  
            }
            if (is_dir($destinoServidor)) {
                
                $archivoDestino = $destinoServidor . "/" . $nombreFichero;
                move_uploaded_file($tmpFichero, $archivoDestino);
                
            }

    
            
            
        }

        // Variables para mostrar/adjuntar
        $archivosGuardados = [];     // rutas completas guardadas
        $nombresGuardados  = [];     // nombres finales para mostrar en la tabla

       

        // Inicializar variables base para correos
        $asunto        = 'asunto';
        $message       = "<h2>$mensaje</h2><br><br><img src=''>";
        $remitente     = "usuario@usuario.com";
        $destinatario  = $email;

        // Confeccionar y enviar mensaje de correo
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host       = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth   = true;
        $mail->Port       = 2525;
        $mail->Username   = '36f2fcb01689f5';
        $mail->Password   = 'f49b40218ef696';

        $mail->setFrom("nombre@del.com", "nombre del remitente");
        $mail->addAddress($email);

        // Adjuntar TODOS los ficheros guardados
        foreach ($archivosGuardados as $idx => $ruta) {
            $mail->addAttachment($ruta, $nombresGuardados[$idx]);
        }

        $mail->addCC('cc@copia.com');
        $mail->addBCC('bcc@oculta.com');
        $mail->isHTML(true);
        $mail->Subject = 'asunto del correo';
        $mail->Body    = "mensaje del correo HTML <strong>$mensaje</strong>";
        $mail->AltBody = "$mensaje";

        if ($mail->send()) {
            echo "mail enviado correctamente";

            // Confeccionar filas de la tabla con los correos enviados
            $correos_enviados[$nombre] = [
                'email'    => $email,
                'telefono' => $telefono,
                'mensaje'  => $mensaje,
                'archivos' => $nombresGuardados,
            ];
            // Guardar de vuelta en la sesión
            $_SESSION['correos']['correos_enviados'] = $correos_enviados;
        } else {
            echo "no se envió correctamente";
        }

        // Para mostrar en la tabla bajo el formulario
        $nombreFichero = implode(', ', $nombresGuardados);

    }

    // guardar correo enviado en el archivo de log en formato csv; (pendiente)
} catch (\Throwable $th) {
    $error = $th->getMessage();
    echo $error;
}
?>



<!DOCTYPE html>
<html>
	<head>
	<title>IEM</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/page.css" type="text/css" />
</head>
<body>
	<div class="wraper">
		<div class="content">
			<div class="slider" >
				<img src="img/iem_3.jpg" /><img src="img/iem_4.jpg" />
		    </div>

		    <div class="sections">
		    	<h1 style="text-align:center">LOCALIZACIÓN DEL CENTRO Y CONTACTO</h1><br><br>
				<span><?=$error ?? null ?></span>
		    	<div class="contacto">
					<h2>CONTACTO</h2>
					<p>Los campos marcados con * son obligatorios.</p><br>
					<form name="form" method="post" action='#' enctype="multipart/form-data">
						<label for="nombre">Nombre: * </label><input type="text" name="nombre" id="nombre" value="<?=$nombre ?? null?>"><br><br>
						<label for="email">Email: * </label><input type="email" name="email" id="email" placeholder="nom@mail.com" value="<?=$email ?? null?>"><br><br>
						<label for="telefono">Teléfono: </label><input type="tel" name="telefono" id="telefono" value="<?=$telefono ?? null ?>"><br><br>
						<label>Mensaje: *</label><br><br>
						<textarea id="mensaje" name="mensaje" placeholder="Introduzca aquí su pregunta o comentario" ><?=$mensaje ?? null?></textarea><br><br>
						<input type="file" name="fichero" value="Fichero" ><br><br>
						<input id="enviar" type="submit" name="enviar" value="Enviar"><br><br>
						<span id='mensajes'></span>
					</form>
					<hr>
					<div class='correo'>
						
						<table>
   							 <tr><td style="color: #000;"><hr><?= htmlspecialchars($nombre) ?></td></tr>							
   							 <tr><td style="color: #000;"><hr><?= htmlspecialchars($email) ?></td></tr>
   							 <tr><td style="color: #000;"><hr><?= htmlspecialchars($telefono) ?></td></tr>							
   							 <tr><td style="color: #000;"><hr><?= htmlspecialchars($mensaje) ?></td></tr>
   							 <tr><td style="color: #000;"><hr><?= htmlspecialchars($consulta) ?></td></tr>
   							 <tr><td style="color: #000;"><hr><?= htmlspecialchars($nombreFichero ?? '') ?></td></tr>
						</table>


					</div>
					<hr>
					<div class='log'>
					</div>
				</div>
		    </div>
		</div>
	</div>
</body>
</html> 
