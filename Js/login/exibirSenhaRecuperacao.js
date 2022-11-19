const passwordInput = document.getElementById("senhaUsuario");
const passwordInputRec = document.getElementById("senhaUsuarioConfirma");

function eyeClick(type) {
	if (type.id == "exibirSenha") {
		let inputTypeIsPassword = passwordInput.type == "password";

		if (inputTypeIsPassword) {
			passwordInput.setAttribute("type", "text");
		} else {
			passwordInput.setAttribute("type", "password");
		}
	} else if (type.id == "exibirSenhaConfirma") {
		let inputTypeIsPassword = passwordInputRec.type == "password";

		if (inputTypeIsPassword) {
			passwordInputRec.setAttribute("type", "text");
		} else {
			passwordInputRec.setAttribute("type", "password");
		}
	} else {
		alert(type.id);
	}
}
