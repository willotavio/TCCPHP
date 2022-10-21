$(document).ready(function () {
	var cepCapturado = $("#cepEdit").val();
	var url = "https://viacep.com.br/ws/" + cepCapturado + "/json";
	$.ajax({
		url: url,
		dataType: "json",
		type: "GET",
		success: function (dados) {
			if (!("erro" in dados)) {
				console.log(dados);
				$("#ruaEdit").val(dados.logradouro);
				$("#bairroEdit").val(dados.bairro);
				$("#cidadeEdit").val(dados.localidade);
				$("#estadoEdit").val(dados.uf);
			} else {
				alert("CEP Não Encontrado");
				$("#ruaEdit").val("");
				$("#bairroEdit").val("");
				$("#cidadeEdit").val("");
				$("#estadoEdit").val("");
			}
		},
	});
});
$(".inputCepEdit").blur(function () {
	var cepCapturado = $("#cepEdit").val();
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
						$("#ruaEdit").val(dados.logradouro);
						$("#bairroEdit").val(dados.bairro);
						$("#cidadeEdit").val(dados.localidade);
						$("#estadoEdit").val(dados.uf);
					} else {
						alert("CEP Não Encontrado");
						$("#ruaEdit").val("");
						$("#bairroEdit").val("");
						$("#cidadeEdit").val("");
						$("#estadoEdit").val("");
					}
				},
			});
		} else {
			alert("Insira o CEP Correto");
			$("#cepEdit").val("");
			$("#ruaEdit").val("");
			$("#bairroEdit").val("");
			$("#cidadeEdit").val("");
			$("#estadoEdit").val("");
		}
	} else {
		alert("Insira o CEP");
		$("#cepEdit").val("");
		$("#ruaEdit").val("");
		$("#bairroEdit").val("");
		$("#cidadeEdit").val("");
		$("#estadoEdit").val("");
	}
});
