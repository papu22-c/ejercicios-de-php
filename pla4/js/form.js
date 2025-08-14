	function validaFormulario() {
		var text="";
		var error=false;

		if($("#nombre").val() == "") {
			//validar nombre informado
			text=(nombre + "\n");
			error=true;
		}

		if($("#email").val() == "") {
			//validar email informado
			text=(text + email + "\n");
			error=true;
		} else {
			//validar email correcto
        	if (!/^\w+([\.-]\w+)*@\w+([\.-]\w+)*$/.test($("#email").val())) {
				text=(text + direccion + "\n");
				error=true;
			}
		}

		if($("#mensaje").val() == "") {
			text=(text + mensaje + "\n");
			error=true;
		} 

		if (!document.getElementById('privacidad').checked) {
			text=(text + normativa);
			error=true;
		};

		if (error==true) {
			text=(revisar + "\n\n" + text + "\n\n");
		}

		if (error==true) {
			alert(text);
		} else {
			$('#form').submit();
 		}
	}