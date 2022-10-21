function efetuarLogin() {
	event.preventDefault();
	var nomeUsuario = $("#nomeUsuario").val();
	var senhaUsuario = $("#senhaUsuario").val();
	if (senhaUsuario != "" && nomeUsuario != "") {
		$.ajax({
			type: "POST",
			url: "crud/login/logar.php",
			data: $("#formLogar").serialize(),
			success: function (resultado) {
				if (resultado == 0) {
					alert("Senha ou Usuário Incorretos");
					$("#senhaUsuario").val("");
				} else if (resultado == 1) {
					window.location.href = "pages/home.php";
				} else {
					alert("ERRO 'INICIAL' TENTE NOVAMENTE OU PEÇA AJUDA DOS ADMINISTRADORES");
					$("#senhaUsuario").val("");
					$("#nomeUsuario").val("");
				}
			},
		});
	} else {
		alert(
			"ERRO 'SENHA/USUARIO' TENTE NOVAMENTE OU PEÇA AJUDA DOS ADMINISTRADORES"
		);
		$("#senhaUsuario").val("");
		$("#nomeUsuario").val("");
	}
}
