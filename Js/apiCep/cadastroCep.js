$(".inputCepCadastro").blur(function () {
	var cepCapturado = $("#cepCadastro").val();
	if (cepCapturado != "") {
		var validarCep = cepCapturado.length;
		if (validarCep == 8) {
			var url = "https://viacep.com.br/ws/" + cepCapturado + "/json";
			$.ajax({
				url: url,
				dataType: "json",
				type: "GET",
				success: function (dados) {
					if (!("erro" in dados)) {
						console.log(dados);
						$("#ruaCadastro").val(dados.logradouro);
						$("#bairroCadastro").val(dados.bairro);
						$("#cidadeCadastro").val(dados.localidade);
						$("#estadoCadastro").val(dados.uf);
					} else {
						alert("CEP Não Encontrado");
						$("#ruaCadastro").val("");
						$("#bairroCadastro").val("");
						$("#cidadeCadastro").val("");
						$("#estadoCadastro").val("");
					}
				},
			});
		} else {
			alert("Insira o CEP Correto");
			$("#cepCadastro").val("");
			$("#ruaCadastro").val("");
			$("#bairroCadastro").val("");
			$("#cidadeCadastro").val("");
			$("#estadoCadastro").val("");
		}
	} else {
		alert("Insira o CEP");
		$("#cepCadastro").val("");
		$("#ruaCadastro").val("");
		$("#bairroCadastro").val("");
		$("#cidadeCadastro").val("");
		$("#estadoCadastro").val("");
	}
});
