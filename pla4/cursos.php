<?php
	session_start();
	
	$idioma = $_SESSION['idioma'] ?? 'ca';

	include_once './php/funciones/idiomas_select.php';
	include_once ("./php/templates/contenido_var_$idioma.php");
	include_once './php/templates/header.php';
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
	<div class="wraper">
		<?php include_once './php/templates/barra_nav.php'?>
		<div class="content">
			<div class="slider" >
				<img src="img/iem_1.jpg" /><img src="img/iem_2.jpg" />
		    </div>
			<?php include_once ("./php/templates/contenido_curso_$idioma.php"); ?>
		</div>
    	<?php include './php/templates/footer.php'; ?>
	</div>
</body>
</html> 
