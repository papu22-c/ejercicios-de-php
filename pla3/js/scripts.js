

//activar listener de los botones de modificación de persona (si no se ha utilizado un onclick en linea)
function trasladarDatos(boton) {
	//buscamos la etiqueta  tr
	let tr = boton.closest('tr')
	let nif = tr.querySelector('.nif').innerText;
	let nombre = tr.querySelector('.nombre').innerText;
	let direccion = tr.querySelector('.direccion').innerText;
	
	//trasladar los datos al formulario
	document.querySelector('#nifModi').value = nif;
	document.querySelector('#nombreModi').value = nombre;
	document.querySelector('#direccionModi').value = direccion;
	
}

//definir función de confirmación de baja

//definir función para trasladar los datos de la persona a modificar al formulario oculto
function modificarPersonas(mod) {
	
	//buscamos la etiqueta  tr
	let tr = mod.closest('tr')
	//let nif = tr.querySelector('.nif').innerText;
	let nombre = tr.querySelector('.nombre').innerText;
	let direccion = tr.querySelector('.direccion').innerText;
	
		//trasladar los datos al formulario
	document.querySelector('#nif').value = nif;
	document.querySelector('#nombre').value = nombre;
	document.querySelector('#direccion').value = direccion;
	document.querySelector('#formularioModi').submit()
}



	

