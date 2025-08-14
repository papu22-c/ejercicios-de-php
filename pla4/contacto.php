<?php
	session_start();
		const CHAR_CODE = "A1B2C3D4E5F6G7H8I9J0K1L2M3N4O5P6Q7R8S9T0U1V2W3X4Z5";
	
	$idioma = $_SESSION['idioma'] ?? 'ca';
		//inicializar variables
		include_once './php/funciones/idiomas_select.php';
		include_once ("./php/templates/contenido_var_$idioma.php");
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		require 'php_mailer/src/Exception.php';
		require 'php_mailer/src/PHPMailer.php';
		require 'php_mailer/src/SMTP.php';
	
	//comprobar si se ha pulsado el botón de enviar
		if (isset($_GET ["enviar"]))
	
		//recuperar y validar datos obligatorios
			
		//si se ha seleccionado un fichero moverlo a la carpeta 'archivos'
			
		//confeccionar y enviar mensaje de correo
			
		//guardar correo enviado en el archivo de log en formato csv;

	//confeccionar filas de la tabla con los correos enviados
	?>

<!DOCTYPE html>
<html>
<head>
	<title>IEM</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/page.css" type="text/css" />
	<script type="text/javascript" src="js/variables_<?=$idioma?>.js"></script>
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script src="js/page.js" type="text/javascript"></script>
	<script src="js/form.js"></script>
</head>

<body>
	<?php include_once './php/templates/header.php'; ?>
	<div class="wraper">
		<?php include_once './php/templates/barra_nav.php'?>
		<div class="content">
			<div class="slider" >
				<img src="img/iem_3.jpg" /><img src="img/iem_4.jpg" />
		    </div>
		    <div class="sections">
		    	<h1 style="text-align:center"><?=$Titulo_contacto_1?></h1><br><br>
		    	<div class="contacto">
					<h2><?=$Titulo_contacto_2?></h2>
					<p><?=$parafo_contacto_1?></p><br>
					<form id="form" name="form" method="get" action='#'>
						<label for="nombre"><?=$nombre?> </label><input type="text" name="nombre" autofocus id="nombre" /><br><br>
						<label for="email"><?=$email?> </label><input type="email" name="email" id="email" placeholder="nom@mail.com" /><br><br>
						<label for="telefono"><?=$telefono?> </label><input type="tel" name="telefono" id="telefono"><br><br>
						<label><?=$mensaje?></label><br><br>
						<textarea id="mensaje" name="mensaje" placeholder="<?=$placeholder?>" ></textarea><br><br>
						<span><?=$politica?></span><br><br>
						<input id="privacidad" type="checkbox" name="privacidad">&nbsp&nbsp
						<span id='ver' onclick="muestraAlert()"><?=$ver?></span><br><br>
						<input type="file" name="fichero"><br><br>
						<input id="enviar" type="button" name="enviar" value="<?=$enviar?>" onclick="validaFormulario()"/><br>
					</form>
					<div id="alerta">
						<span id="alertatext"><?php include_once ("./php/templates/contacto_span_$idioma.php") ?><br><br>
						<input type="button" onclick="ocultaAlert()"/>
					</div>
					<hr>
					<div class='correo'></div>
					<hr>
					<div class='log'>
						<table></table>
					</div>
				</div>
		    </div>
		    <br><br>
		</div>
		<?php include './php/templates/footer.php';	?>
	</div>
</body>
</html> 
