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
    $resultadoFinal = '';

$resultadoFinal .= '<div class="container" >';
$resultadoFinal .= '<div class="form-floating mb-3 mt-3">';
$resultadoFinal .= '<input type="text" class="form-control inputCadastro" required placeholder="NOME" readonly value="'. $nomeR . '">';
$resultadoFinal .= ' <label class="labelCadastro">NOME</label>';
$resultadoFinal .= '</div>';

$resultadoFinal .= '<div class="form-floating mb-3 mt-3">';
$resultadoFinal .= '<input type="date" class="form-control inputCadastro" required placeholder="DATA DE NASCIMENTO" readonly value="'. $dataNascR . '">';
$resultadoFinal .= ' <label class="labelCadastro">DATA DE NACIMENTO</label>';
$resultadoFinal .= '</div>';

$resultadoFinal .= '<div class="form-floating mb-3 mt-3">';
$resultadoFinal .= '<input type="text" class="form-control inputCadastro" required placeholder="SEXO" readonly value="'. $sexoR . '">';
$resultadoFinal .= ' <label class="labelCadastro">SEXO</label>';
$resultadoFinal .= '</div>';

$resultadoFinal .= '<div class="form-floating mb-3 mt-3">';
$resultadoFinal .= '<input type="text" class="form-control inputCadastro" required placeholder="CELULAR" readonly value="'. $celular . '">';
$resultadoFinal .= ' <label class="labelCadastro">CELULAR</label>';
$resultadoFinal .= '</div>';

$resultadoFinal .= '<div class="form-floating mb-3 mt-3">';
$resultadoFinal .= '<input type="text" class="form-control inputCadastro" required placeholder="TELEFONE" readonly value="'. $telefone . '">';
$resultadoFinal .= ' <label class="labelCadastro">TELEFONE</label>';
$resultadoFinal .= '</div>';

$resultadoFinal .= '<div class="form-floating mb-3 mt-3">';
$resultadoFinal .= '<input type="text" class="form-control inputCadastro" required placeholder="EMAIL" readonly value="'. $email . '">';
$resultadoFinal .= ' <label class="labelCadastro">EMAIL</label>';
$resultadoFinal .= '</div>';

$resultadoFinal .= '<div class="form-floating mb-3 mt-3">';
$resultadoFinal .= '<input type="text" class="form-control inputCadastro" required placeholder="NUMERO RESIDENCIA" readonly value="'. $numR . '">';
$resultadoFinal .= ' <label class="labelCadastro">NUMERO RESIDENCIA</label>';
$resultadoFinal .= '</div>';

$resultadoFinal .= '<div class="form-floating mb-3 mt-3">';
$resultadoFinal .= '<input type="date" class="form-control inputCadastro" required placeholder="DATA DE ATENDIMENTO" readonly value="'. $dataAtenR . '">';
$resultadoFinal .= ' <label class="labelCadastro">DATA DE ATENDIMENTO</label>';
$resultadoFinal .= '</div>';

$resultadoFinal .= '<div class="form-floating mb-3 mt-3">';
$resultadoFinal .= '<input type="text" class="form-control inputCadastro" required placeholder="CPF" readonly value="'. $cpf . '">';
$resultadoFinal .= ' <label class="labelCadastro">CPF</label>';
$resultadoFinal .= '</div>';

$resultadoFinal .= '<div class="form-floating mb-3 mt-3">';
$resultadoFinal .= '<input type="text" class="form-control inputCadastro" required placeholder="CEP" readonly value="'. $cep . '">';
$resultadoFinal .= ' <label class="labelCadastro">CEP</label>';
$resultadoFinal .= '</div>';



$resultadoFinal .= '</div>';

echo $resultadoFinal;


?>