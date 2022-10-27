<?php
include_once '../../connection/conexao.php';
$banco = new conexao();
$con = $banco->getConexao();
$id = filter_input(INPUT_POST, 'id');

$sql = "SELECT * FROM usuario where id_usuario = $id";


$result = $con->query($sql);
if ($result->rowCount() > 0) {

    while ($row = $result->fetch()) {
        $id = $row['id_usuario'];
        $nomeU = $row['nome_usuario'];
        $tipoU = $row['tipo_usuario'];
        $emailU = $row['email_usuario'];
        $imgU = $row['imagem_usuario'];
    }
}
?>
<div class="container">
    <form autocomplete="off">
        <div class='form-floating mb-3 mt-3'>
            <input class='form-control inputGeral' type='number' name='idFuncionario' placeholder='Id' id="idFuncionario" value=<?php echo $id?> readonly>
            <label class='labelCadastro'>ID</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control inputGeral" type="text" name="celular" placeholder="Celular" readonly value=<?php echo $nomeU ?>>
            <label class="labelCadastro">Nome</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control inputGeral" type="text" name="telefone" placeholder="Telefone" readonly value=<?php echo $tipoU ?>>
            <label class="labelCadastro">Tipo do Usuario</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control inputGeral" type="email" name="email" placeholder="Email" readonly value=<?php echo $emailU ?>>
            <label class="labelCadastro">Email</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <br>
            <?php echo '<img src="data:../imgs/conta;base64,' . base64_encode($imgU) . '" style="border-radius:50px;width: 100x; height: 100px;">' ?>
        </div>
    </form>
</div>