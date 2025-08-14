<?php
	$idiomas_disponibles = ['es','ca'];
	$idioma_navegador = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
    if (in_array($idioma_navegador, $idiomas_disponibles)) $idioma = $idioma_navegador;
    
	if (isset($_GET["idioma"]) && in_array($_GET["idioma"], $idiomas_disponibles)){
        $idioma = $_GET['idioma'];        
        setcookie('idioma', $idioma, time() + 3600);
		
    }elseif (isset($_COOKIE['idioma'], $idiomas_disponibles)) $idioma = $_COOKIE['idioma'];
    
    $_SESSION['idioma'] = $idioma;
?>