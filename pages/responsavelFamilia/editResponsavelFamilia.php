<?php 
include_once '../../connection/conexao.php';
$id = filter_input(INPUT_POST, 'id');

    $banco = new conexao();
    $con = $banco->getConexao();  
    $sql = "SELECT 
    responsavel_familia.id_responsavel,
    responsavel_familia.nome_responsavel,
    responsavel_familia.data_nascimento_responsavel,
    responsavel_familia.sexo_responsavel,
    responsavel_familia.data_atendimento_responsavel,
    responsavel_familia.cpf_responsavel,
    responsavel_familia.cep_responsavel,
    responsavel_familia.complemento_responsavel,
    responsavel_familia.num_responsavel,
    contato.celular,
    contato.telefone,
    contato.email
    FROM responsavel_familia INNER JOIN contato ON responsavel_Familia.id_responsavel = contato.Id_contato where id_responsavel=$id";
        $result = $con->query($sql);
        if ($result->rowCount() > 0) {

            while ($row = $result->fetch()) {
            $id = $row['id_responsavel'];
            $nome = $row['nome_responsavel'];
            $dataNascimento = $row['data_nascimento_responsavel'];
            $sexo = $row['sexo_responsavel'];
            $celular = $row['celular'];
            $telefone = $row['telefone'];
            $email = $row['email'];
            $complemento = $row['complemento_responsavel'];
            $numeroResidencia= $row['num_responsavel'];
            $dataAtendimento = $row['data_atendimento_responsavel'];
            $cpf = $row['cpf_responsavel'];
            $cep = $row['cep_responsavel'];
            }
        }
        ?>

<div class="container">
    <form action='../../crud/responsavelFamilia/editarInfoResponsavelFamilia.php' method='POST' autocomplete="off">
        <div class="form-floating mb-3 mt-3">
            <input class="form-control inputGeral" type="number" name="id" required placeholder="Data de Nascimento"
                value=<?php echo $id?> readonly>
            <label class="labelCadastro">ID</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control inputGeral" type="date" name="dataNascimento" required
                placeholder="Data de Nascimento" value=<?php echo $dataNascimento?>>
            <label class="labelCadastro">Data de Nascimento</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control inputGeral" name='nome' required placeholder="Nome"
                value='<?php echo $nome?>'>
            <label class="labelCadastro">Nome</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control inputGeral" type="number" name="cpf" required placeholder="CPF"
                value=<?php echo $cpf?>>
            <label class="labelCadastro">CPF</label>
        </div>
        <div class="mb-3">
            <?php
            if($sexo == "F"){
                echo "<select class='form-select' aria-label='Default select example'value='echo $sexo' name='sexo'>
                    <option value='F' name='sexoP'>Feminino</option>
                    <option value='M' name='sexoP'>Masculino</option>
                </select>";
            }else{
                echo "<select class='form-select' aria-label='Default select example'value='echo $sexo' name='sexo'> 
                    <option value='F' name='sexoP'>Feminino</option>
                    <option value='M' name='sexoP' selected>Masculino</option>
                </select>";
            }
        ?>
            <div class="form-floating mb-3 mt-3">
                <input class="form-control inputGeral" type="text" name="celular" placeholder="Celular"
                    value=<?php echo $celular?>>
                <label class="labelCadastro">Celular</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input class="form-control inputGeral" type="text" name="telefone" placeholder="Telefone"
                    value=<?php echo $telefone?>>
                <label class="labelCadastro">Telefone</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input class="form-control inputGeral" type="email" name="email" placeholder="Email"
                    value=<?php echo $email?>>
                <label class="labelCadastro">Email</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input class="form-control inputCepEdit inputGeral" type="text" name="cep" placeholder="CEP" required
                    value=<?php echo $cep?> id="cepEdit">
                <label class="labelCadastro">CEP</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input class="form-control inputGeral" type="text" id="ruaEdit" name="ruaEdit" placeholder="Rua"
                    readonly>
                <label class="labelCadastro">Rua</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input class="form-control inputGeral" type="text" id="bairroEdit" name="bairroEdit"
                    placeholder="Bairro" readonly>
                <label class="labelCadastro">Bairro</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input class="form-control inputGeral" type="text" id="cidadeEdit" name="cidadeEdit"
                    placeholder="Cidade" readonly>
                <label class="labelCadastro">Cidade</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input class="form-control inputGeral" type="text" name="estadoEdit" id="estadoEdit"
                    placeholder="Estado" readonly>
                <label class="labelCadastro">Estado</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input class="form-control inputGeral" type="number" name="numeroResidencia"
                    placeholder="Número da Residência" required value=<?php echo $numeroResidencia?> min="0">
                <label class="labelCadastro">Número Residência</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input class="form-control inputGeral" type="text" name="complemento" placeholder="Complemento"
                    value='<?php echo $complemento?>'>
                <label class="labelCadastro">Complemento</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input class="form-control inputGeral" type="date" name="dataAtendimento" placeholder="atendimento"
                    value=<?php echo $dataAtendimento?>>
                <label class="labelCadastro">Data atendimento</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                    id="closeEdit">Fechar</button>
                <input type='submit' class='btn btn-outline-success' name='update' value='Editar'>
            </div>
    </form>
</div>
<script src="../../Js/apiCep/editCep.js"></script>