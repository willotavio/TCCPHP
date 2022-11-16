<?php 
include_once '../../connection/conexao.php';
$id = filter_input(INPUT_POST, 'id');

    $banco = new conexao();
    $con = $banco->getConexao();  
    $sql = "SELECT  entradaEstoque.id_entradaEstoque,
    entradaEstoque.quantidade_entradaEstoque,
    entradaEstoque.data_entradaEstoque as data,
    usuario.nome_usuario as nome FROM entradaEstoque LEFT JOIN usuario ON usuario.id_usuario = entradaEstoque.id_entradaEstoque  WHERE id_entradaEstoque = $id";
        $result = $con->query($sql);
        if ($result->rowCount() > 0) {

            while ($row = $result->fetch()) {
            $id = $row['id_entradaEstoque'];
            $nome = $row['nome'];
            $quantidade = $row['quantidade_entradaEstoque'];
            $data= $row['data'];
            }
        }
        ?>

<div class="container">
    <form action='../../crud/cestas/controlecestas.php' method='GET' autocomplete="off">
        <div class="form-floating mb-3 mt-3">
            <input class="form-control inputGeral" type="number" name="idCesta" required
                placeholder="Data de Nascimento" value=<?php echo $id?> readonly>
            <label class="labelCadastro">ID</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control inputGeral" type="date" name="recebimentoCestas" required
                placeholder="Data de Entrada" value=<?php echo $data?>>
            <label class="labelCadastro">Data de Entrada</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control inputGeral" name='nome' placeholder="Nome"
                value="<?php if($nome = 'null'){echo 'funcionario';} else{echo $nome;}?>" readonly> <label
                class="labelCadastro">Nome</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control inputGeral" type="number" name="quantidadeCestas" required placeholder="CPF"
                value=<?php echo $quantidade?>>
            <label class="labelCadastro">Quantidade</label>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
            <input type='submit' class='btn btn-outline-success' name='botao' value='Editar'>
        </div>
    </form>
</div>