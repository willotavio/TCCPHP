<script>
    $(document).ready(function(){
        // Open modal on page load
        /* $("#edit").modal('show'); */
        // Close modal on button click
        $("#close").click(function(){
            $("#edit").modal('hide');
        });
        $(".close").click(function(){
            $("#edit").modal('hide');
        });
    });
</script>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container" style="text-align:center"><h4 class="modal-title" id="exampleModalLabel">Editar Cesta</h4></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                      <form action='../../../crud/cestas/editCestas.php' method='GET' autocomplete='off'>
                        <div class='form-floating mb-3 mt-3'>
                            <input class='form-control'  type='number'  name='idCestas1' placeholder='Id'  id="idCestas1" readonly>
                            <label class='labelCadastro'>ID</label>
                        </div>
                        <div class='form-floating mb-3 mt-3'>
                            <input class='form-control'  type='number'  name='quantidadeCestas1' placeholder='Quantidade'  id="quantidadeCestas1">
                            <label class='labelCadastro'>Quantidade</label>
                        </div>
                        <div class='form-floating mb-3 mt-3'>
                            <input class='form-control'  type='date'  name='recebimentoCestas1' placeholder='Data Recebimento'  id="recebimentoCestas1">
                            <label class='labelCadastro'>Data Recebimento</label>
                        </div>			
				    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="close">Fechar</button>
                    <p style='text-align:center'><input type='submit' class='btn btn-outline-success' name='update'
                            value='Atualizar'>
                </div>
            </div>
            </form>
        </div>
    </div>
