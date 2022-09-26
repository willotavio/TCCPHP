<script>
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById("endereco1").value = "";
    document.getElementById("bairro1").value = "";
    document.getElementById("cidade1").value = "";
    document.getElementById("estado1").value = "";
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById("endereco1").value = conteudo.logradouro;
        document.getElementById("bairro1").value = conteudo.bairro;
        document.getElementById("cidade1").value = conteudo.localidade;
        document.getElementById("estado1").value = conteudo.uf;
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, "");

    //Verifica se campo cep possui valor informado.
    if (cep != "") {
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById("endereco1").value = "...";
            document.getElementById("bairro1").value = "...";
            document.getElementById("cidade1").value = "...";
            document.getElementById("estado1").value = "...";

            //Cria um elemento javascript.
            var script = document.createElement("script");

            //Sincroniza com o callback.
            script.src =
                "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callback";

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}
</script>
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
            value=<?php echo $nomeR?> readonly>
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
        <input class="form-control inputCadastro" type="text" id="cep1" name="cep1" placeholder="CEP" required
            onblur="pesquisacep(this.value);" value=<?php echo $cep?> readonly>
        <label class="labelCadastro">CEP</label>
        <script>
        $(document).ready(function() {
            pesquisacep("<?php echo $cep?>");
        });
        </script>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" id="endereco1" name="rua1" placeholder="Rua" readonly>
        <label class="labelCadastro">Rua</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" id="bairro1" name="bairro1" placeholder="Bairro" readonly>
        <label class="labelCadastro">Bairro</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" id="cidade1" name="cidade1" placeholder="Cidade" readonly>
        <label class="labelCadastro">Cidade</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" name="estado1" id="estado1" 1 placeholder="Estado"
            readonly>
        <label class="labelCadastro">Estado</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="number" name="numRes" placeholder="Número da Residência"
            required value=<?php echo $numR?> readonly>
        <label class="labelCadastro">Número Residência</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="text" name="complemento" placeholder="Complemento"
            value=<?php echo $compR?> readonly>
        <label class="labelCadastro">Complemento</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input class="form-control inputCadastro" type="date" name="atendimento" placeholder="atendimento"
            value=<?php echo $dataAtenR?> readonly>
        <label class="labelCadastro">Data atendimento</label>
    </div>

</div>