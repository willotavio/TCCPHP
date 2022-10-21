$(document).ready(function () {
	var cepCapturado = $("#cepConsulta").val();
	var url = "https://viacep.com.br/ws/" + cepCapturado + "/json";
	$.ajax({
		url: url,
		dataType: "json",
		type: "GET",
		success: function (dados) {
			if (!("erro" in dados)) {
				console.log(dados);
				$("#ruaConsulta").val(dados.logradouro);
				$("#bairroConsulta").val(dados.bairro);
				$("#cidadeConsulta").val(dados.localidade);
				$("#estadoConsulta").val(dados.uf);
			} else {
				alert("CEP Não Encontrado");
				$("#ruaConsulta").val("");
				$("#bairroConsulta").val("");
				$("#cidadeConsulta").val("");
				$("#estadoConsulta").val("");
			}
		},
	});
});
