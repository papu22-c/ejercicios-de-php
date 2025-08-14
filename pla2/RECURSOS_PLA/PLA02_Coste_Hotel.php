<?php

session_start();

extract($_SESSION['datos']?? null);

$_SESSION['datos'];

$ciudad = $ciudad ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>PLA02</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<main>
		<h1 class='centrar'>PLA02: COSTE HOTEL</h1>
		<br>
		<form method="post" action="php/datos.php">
			<div class="row mb-3">
			    <label for="noches" class="col-sm-3 col-form-label">Número de noches:</label>
			    <div class="col-sm-9">
			      <input type="number" class="form-control" name="noches" id="noches" value='<?php echo$noches ?? null ?>'>
			    </div>
			</div>
			<div class="row mb-3">
			    <label for="ciudad" class="col-sm-3 col-form-label">Destino:</label>
			    <div class="col-sm-9">
					<select class="form-select" name='ciudad'>
					  	<option disabled selected value=''>Selecciona un destino</option>
					  	<option <?php if($ciudad == 'Madrid') {echo 'selected';}?>>Madrid</option>
						<option <?php if($ciudad == 'Paris') {echo 'selected';}?>>Paris</option>
						<option <?php if($ciudad == 'Los Angeles') {echo 'selected';}?>>Los Angeles</option>
						<option <?php if($ciudad == 'Roma') {echo 'selected';}?>>Roma</option>
					</select>
				</div>
			</div>
			<div class="row mb-3">
			    <label for="coche" class="col-sm-3 col-form-label">Días alquiler coche:</label>
			    <div class="col-sm-9">
			      <input type="number" class="form-control" name="coche" value="0" id="coche">
			    </div>
			</div>
			<label class="col-sm-3 col-form-label"></label>
		  	<button type="submit" class="btn btn-primary" name='enviar'>Enviar datos</button>
		  	<br><br>
		  	<div class="row mb-3">
			    <label class="col-sm-3 col-form-label">Coste total: </label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" name="total" id="total" disabled value="<?php echo$total ?? '' ?>" >
			    </div>
			</div><br>
			<span class='errores'><?php echo$error ?? '' ?></span>
		</form>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php 
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>