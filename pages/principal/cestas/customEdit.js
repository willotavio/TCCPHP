$(document).ready(function () {
	$(document).on("click", ".edit", function () {
		var id = $(this).val();
		var first = $("id" + id).text();
		var last = $("#quantidade" + id).text();
		var address = $("#recebimento" + id).text();

		$("#edit").modal("show");
		$("#idCestas1").val(id);
		$("#quantidadeCestas1").val(last);
		$("#recebimentoCestas1").val(address);
	});
});
