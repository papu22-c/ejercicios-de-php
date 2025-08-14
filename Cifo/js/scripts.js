

//activar listener de los botones de modificación de persona (si no se ha utilizado un onclick en linea)
function trasladarDatos(ev) {
	
	//buscamos la etiqueta  tr
	let botonPulsado = ev.target
	let tr = botonPulsado.closest('tr')
	let nif = tr.querySelector('.nif').innerText;
	let nombre = tr.querySelector('.nombre').value;
	let direccion = tr.querySelector('.direccion').value;
	
	//trasladar los datos al formulario
	document.querySelector('#nifModi').value = nif;
	document.querySelector('#nombreModi').value = nombre;
	document.querySelector('#direccionModi').value = direccion;

	//subir del formulario
	document.querySelector('#formularioModi').submit()
	
}
function borrarDatos(br){
	let boton = br.target
	let tr = boton.closest('tr')
	let nif = tr.querySelector('.nif').innerText
	
	//trasladar dato al formulario
	document.querySelector('#nifBaja').value = nif;
	document.querySelector('#formularioBaja').submit()
}

