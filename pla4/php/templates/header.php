<?php
	$idioma = $_SESSION['idioma'] ?? 'ca';
	$archivo = basename($_SERVER['PHP_SELF']);
?>

<header>
	<img src="img/IEM_logo.png">
	<h1><?=$Titulo_header?></h1>
	<a href="<?=$archivo?>?idioma=es">ES</a> | <a href="<?=$archivo?>?idioma=ca">CA</a>  
</header><br>