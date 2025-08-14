<?php

	//inicializar variables
	$nif 			= '';
	$nombre 		= '';
	$edad 			= '';
	$departamento 	= '';
	$añoAlta 		= '';
	$inicioContrato = '';
	$finContrato    = '';

	//incorporar los ficheros con las clases
	require_once('clases/empleados.php');
	require_once('clases/empleadoTemporal.php');
	require_once('clases/empleadoFijo.php');
	require_once('clases/empleadoHoras.php');
	require_once('clases/Administracion.php');

	

	//consulta de todos los empleados
	$consulta = Administracion::consultaEmpleados();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>POO</title>
	<style type="text/css">
		.empleados {width: 500px; padding: 10px; border: 2px solid grey; margin: auto; margin-bottom: 10px; background-color: lightblue;}
		table, td {border: 1px solid grey;margin: auto;padding:5px;}
	</style>
</head>
<body>
	<div class='empleados'>
		<h3>Empleado Fijo</h3>
		<?php
		try {
			$empleado = new EmpleadoFijo('x507392tG', 'Juanita', 20, 'produccion', 2005);
			//mostrar todos los datos del empleado temporal
			echo $empleado->verDatos(). "<br>";
			//ejecutar el método de calculo de salario
			echo $empleado->calcularSueldo();
		} catch (Exception $error) {
			echo $error->getMessage();
		}
		?>
	</div>
	<div class='empleados'>
		<h3>Empleado Horas</h3>
		<?php
		try {
			$empleado = new empleadoHoras('5555315k', 'Pancho', 25, 'Limpieza', 20);
			//mostrar todos los datos del empleado temporal
			echo $empleado->verDatos(). "<br>";
			
			//ejecutar el método de calculo de salario
			echo $empleado->calcularSueldo();
		} catch (Exception $error) {
			echo $error->getMessage();
		}
		?>
	</div>
	<div class='empleados'>
		<h3>Empleado Temporal</h3>
		<?php
		try {
			$empleado = new EmpleadoTemporal('3540498g', 'Alberto', 30, 'servicio tecnico', '20/12/2020', '10/12/2026');
			//mostrar todos los datos del empleado temporal
			echo $empleado->verDatos(). "<br>";
			//ejecutar el método de calculo de salario
			echo $empleado->calcularSueldo();
		} catch (Exception $error) {
			echo $error->getMessage();
		}
		?>
	</div>
	<table>
		<?php 
		
		foreach ($consulta as $fila) {
			echo "<tr>";
			foreach ($fila as $dato) {
				echo "<td>" . htmlspecialchars($dato) . "</td>";
			}
			echo "</tr>";
		}
  
		?>
	</table>
</body>
</html>