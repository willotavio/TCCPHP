$(document).ready(function () {
	$(document).on("click", ".view", function () {
		var id = $(this).val();
		if (id != "") {
			var dados = {
				id: id,
			};
			$.ajax({
				type: "POST",
				url: "consultaResponsavelFamilia.php",
				data: dados,
				success: function (resultado) {
					$("#consultarResponsavel").html(resultado);
					$("#consultar").modal("show");
				},
			});
		} else {
			alert("ERRO ID VAZIO");
		}
	});

	$(document).on("click", ".edit", function () {
		var id = $(this).val();
		if (id != "") {
			var dados = {
				id: id,
			};
			$.ajax({
				type: "POST",
				url: "editResponsavelFamilia.php",
				data: dados,
				success: function (resultado) {
					$("#editarResponsavel").html(resultado);
					$("#edit").modal("show");
				},
			});
		} else {
			alert("ERRO ID VAZIO");
		}
	});

	$(document).ready(function () {
		$(document).on("click", ".delete", function () {
			var id = $(this).val();
			$("#delete").modal("show");
			$("#idResponsavel").val(id);
		});
	});
	$(document).ready(function () {
		$(document).on("click", ".doar", function () {
			var id = $(this).val();
			$("#doarCesta").modal("show");
		});
	});
});
