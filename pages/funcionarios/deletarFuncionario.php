<script>
$(document).ready(function() {
    // Open modal on page load
    /* $("#edit").modal('show'); */
    // Close modal on button click
    $("#closeDelete").click(function() {
        $("#deleteFuncionario").modal('hide');
    });
    $(".close").click(function() {
        $("#deleteFuncionario").modal('hide');
    });
});
</script>



<div class="modal fade" id="deleteFuncionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action='../../crud/criarConta/deleteFuncionario.php' method='GET' autocomplete='off'>
                        <div class='form-floating mb-3 mt-3'>
                            <input class='form-control inputCadastro' type='number' name='idFuncionario'
                                placeholder='Id' id="idFuncionario" readonly>
                            <label class='labelCadastro'>ID</label>
                        </div>
                        <p>Realmente deseja excluir esse Funcionário?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                        id="closeDelete">Fechar</button>
                    <p style='text-align:center'><input type='submit' class='btn btn-outline-success' name='update'
                            value='Deletar'>
                </div>
            </div>
        </div>
    </div>