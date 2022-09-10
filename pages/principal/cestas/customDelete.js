$(document).ready(function () {
	$(document).on("click", ".delete", function () {
		var id = $(this).val();

		$("#delete").modal("show");
		$("#cod").val(id);
	});
});
