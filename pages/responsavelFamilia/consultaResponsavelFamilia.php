<?php 
include_once '../../connection/conexao.php';
 $id = filter_input(INPUT_POST, 'id');

    $banco = new conexao();
    $con = $banco->getConexao();  
    $sql = "SELECT 
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
            $nomeR = $row['nome_responsavel'];
            $dataNascR = $row['data_nascimento_responsavel'];
            $sexoR = $row['sexo_responsavel'];
            $celular = $row['celular'];
            $telefone = $row['telefone'];
            $email = $row['email'];
            $compR = $row['complemento_responsavel'];
            $numR= $row['num_responsavel'];
            $dataAtenR = $row['data_atendimento_responsavel'];
            $cpf = $row['cpf_responsavel'];
            $cep = $row['cep_responsavel'];
            }
        }
        ?>
<div class="container">
    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control inputCadastro" name='nome' required placeholder="Nome"
            value='<?php echo $nomeR?>' readonly>
        <label class="labelCadastro">Nome</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="date" name="dataNasc" required placeholder="Data de Nascimento"
            value=<?php echo $dataNascR?> readonly>
        <label class="labelCadastro">Data de Nascimento</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="number" name="cpf" required placeholder="CPF"
            value=<?php echo $cpf?> readonly>
        <label class="labelCadastro">CPF</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" name="sexo" placeholder="SEXO" value=<?php if($sexoR == "M"){
                echo "MASCULINO";
            }else{
                echo "FEMININO";
            }
            ?> readonly>
        <label class="labelCadastro">SEXO</label>
    </div>

    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" name="celular" placeholder="Celular"
            value=<?php echo $celular?> readonly>
        <label class="labelCadastro">Celular</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" name="telefone" placeholder="Telefone"
            value=<?php echo $telefone?> readonly>
        <label class="labelCadastro">Telefone</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="email" name="email" placeholder="Email"
            value=<?php echo $email?> readonly>
        <label class="labelCadastro">Email</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" id="cepConsulta" name="cepConsulta" placeholder="CEP"
            required value=<?php echo $cep?> readonly>
        <label class="labelCadastro">CEP</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" id="ruaConsulta" name="ruaConsulta" placeholder="Rua"
            readonly>
        <label class="labelCadastro">Rua</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" id="bairroConsulta" name="bairroConsulta"
            placeholder="Bairro" readonly>
        <label class="labelCadastro">Bairro</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" id="cidadeConsulta" name="cidadeConsulta"
            placeholder="Cidade" readonly>
        <label class="labelCadastro">Cidade</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" name="estadoConsulta" id="estadoConsulta" 1
            placeholder="Estado" readonly>
        <label class="labelCadastro">Estado</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="number" name="numRes" placeholder="Número da Residência"
            required value=<?php echo $numR?> readonly>
        <label class="labelCadastro">Número Residência</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" name="complemento" placeholder="Complemento"
            value='<?php echo $compR?>' readonly>
        <label class="labelCadastro">Complemento</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="date" name="atendimento" placeholder="atendimento"
            value=<?php echo $dataAtenR?> readonly>
        <label class="labelCadastro">Data atendimento</label>
    </div>
</div>
<script src="../../Js/apiCep/consultaCep.js"></script>