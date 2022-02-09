class User {

	// el parámetro input contiene la información del campo de texto que solicite este método para borrar los mensajes de validación
	ClearMessages(input) {

		switch(input.name) {
			case "nif":
				document.getElementById(input.name + 's').innerHTML = "";
				break;
			case "name":
				document.getElementById(input.name + 's').innerHTML = "";
				break;
			case "lastName":
				document.getElementById(input.name + 's').innerHTML = "";
				break;
			case "email":
				document.getElementById(input.name + 's').innerHTML = "";
				break;
			case "password":
				document.getElementById(input.name + 's').innerHTML = "";
				break;
		}
	}
}