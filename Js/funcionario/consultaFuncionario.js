
    $(document).on("click", ".consultFuncionario", function () {
		var id = $(this).val();
		if (id != "") {
			var dados = {
				id: id,
			};
			$.ajax({
				type: "POST",
				url: "consultaFuncionario.php",
				data: dados,
				success: function (resultado) {
					$("#consultarFuncionario").html(resultado);
					$("#consultarFuncionarioModal").modal("show");
				},
			});
		} else {
			alert("ERRO ID VAZIO");
		}
	});