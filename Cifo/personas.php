<?php

	session_start();
	//require_once './servicios/funciones/alta_persona.php';


	//Extraer los datos de la variable de sesión que utilizaremos en el documento html
	extract($_SESSION['datosPersonas'] ?? null);

	$personas = $_SESSION['datosPersonas']['personas'] ?? [];

?>
<html>
<head>
	<title>PLA03</title>
	<meta charset='UTF-8'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<main>
		<h1 class='centrar'>PLA03: MANTENIMIENTO PERSONAS</h1>
		<br>
		<form method='post' action='./servicios/operativas.php'>
		  <div class="row mb-3">
		    <label for="nif" class="col-sm-2 col-form-label">Nif</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="nif" name='nif' value="<?=$nif ?? null ?>">
		    </div>
		  </div>
		  <div class="row mb-3">
		    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="nombre" name="nombre" value='<?=stripslashes($nombre ?? '')?>'>
		    </div>
		  </div>
		  <div class="row mb-3">
		    <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="direccion" name="direccion" value="<?=$direccion ?? null ?>">
		    </div>
		  </div>
		  <label for="nombre" class="col-sm-2 col-form-label"></label>
		  <button type="submit" class="btn btn-success" name='alta'>Alta persona</button>
		  <br><br>
		  <span id="mensaje" class="color_text"><?=$mensaje ?? null ?></span>
		</form><br>
		
		<table class="table table-striped">
			<tr class='table-dark'><th scope="col">NIF</th><th scope="col">Nombre</th><th scope="col">Dirección</th><th scope="col"></th></tr>
			<?php 
				// Hordena un array por las claves asociativas
				ksort($personas);
				foreach ($personas as $nifTabla=> $persona) {
					echo "<tr>";
					echo "<td class='nif'>$nifTabla</td>";
					echo "<td><input type='text' value='$persona[nombre] ' class='nombre' ></td>";
					echo "<td><input type='text' value='$persona[direccion] ' class='direccion'></td>";
					echo "<td><button  onclick='trasladarDatos(event)' type='button' class='btn btn-primary' name='modiPersona'>Modificar</button></td>";
					echo "<td><button  onclick='borrarDatos(event)' type='button' class='btn btn-warning' name='bajaPersona'>baja</button></td>";
					echo "<td>";
				}
		    ?>
	
		    </tr>
		
		</table>
	
		<form method='post' action='servicios/operativas.php' id='formularioBaja'>
			<input type='hidden' id='nifBaja' name='nifBaja'></input>
			<input type='hidden' name='formularioBaja'>
		</form>

		<!--FORMULARIO OCULTO PARA LA MODIFICACION-->
		<form method='post' action='./servicios/operativas.php' id='formularioModi'>
			<input type='hidden' name='nifModi' id='nifModi'>
			<input type='hidden' name='nombreModi' id='nombreModi'>
			<input type='hidden' name="direccionModi" id='direccionModi'>
			<input type='hidden' name='formularioModi'>
		</form>
	</main>

	<script type="text/javascript" src='js/scripts.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


