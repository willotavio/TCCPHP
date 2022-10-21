$(document).ready(function () {
	$(document).on("click", ".deleteFuncionario", function () {
		var id = $(this).val();

		$("#deleteFuncionario").modal("show");
		$("#idFuncionario").val(id);
	});
	$(document).on("click", ".editFuncionario", function () {
		var id = $(this).val();

		$("#editFuncionario").modal("show");
		$("#idFuncionario").val(id);
	});
});
