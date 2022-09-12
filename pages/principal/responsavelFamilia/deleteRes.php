<script>
    $(document).ready(function(){
        // Open modal on page load
        /* $("#edit").modal('show'); */
        // Close modal on button click
        $("#closeDelete").click(function(){
            $("#deleteR").modal('hide');
        });
        $(".close").click(function(){
            $("#deleteR").modal('hide');
        });
    });
</script>



<div class="modal fade" id="deleteR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="container-fluid">
            <form action='../../../crud/responsavelF/deleteResponsavelF.php' method='GET' autocomplete='off'>
                <div class='form-floating mb-3 mt-3'>
                    <input class='form-control inputCadastro'  type='number'  name='idResponsavel1' placeholder='Id'  id="cod1" readonly>
                    <label class='labelCadastro'>ID</label>
                </div>
            <p>Realmente deseja excluir esse Responsavel?</p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeDelete">Fechar</button>
        <p style='text-align:center'><input type='submit' class='btn btn-outline-success' name='update'
                            value='Deletar'>
      </div>
    </div>
  </div>
</div>