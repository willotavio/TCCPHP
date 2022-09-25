<script>
$(document).ready(function() {
    // Open modal on page load
    /* $("#edit").modal('show'); */
    // Close modal on button click
    $("#closeDelete").click(function() {
        $("#delete").modal('hide');
    });
    $(".close").click(function() {
        $("#delete").modal('hide');
    });
});
</script>
<style>
<?php include '../../style.css';
?>
</style>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container" style="text-align:center">
                    <h4 class="modal-title" id="exampleModalLabel1">Apagar Responsavel</h4>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action='../../../crud/cestas/deleteCestas.php' method='GET' autocomplete='off'>
                        <div class='form-floating mb-3 mt-3'>
                            <input class='form-control inputCadastro' type='number' name='idCestas1' placeholder='Id'
                                id="cod" readonly>
                            <label class='labelCadastro'>ID</label>
                        </div>
                        <p>Realmente deseja excluir esse Responsavel?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                        id="closeDelete">Fechar</button>
                    <p style='text-align:center'><input type='submit' class='btn btn-outline-success' name='update'
                            value='Atualizar'>
                </div>
            </div>
            </form>
        </div>
    </div>