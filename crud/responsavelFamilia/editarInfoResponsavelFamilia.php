<?php
    include_once('../../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();

    if(isset($_POST['update'])){

            $id = filter_input(INPUT_POST,'id');
            $nome = filter_input(INPUT_POST,'nome');
            $data_nascimento = filter_input(INPUT_POST,'dataNascimento');
            $sexo =filter_input(INPUT_POST,'sexo');
            $complemento = filter_input(INPUT_POST,'complemento');
            $numero_residencia= filter_input(INPUT_POST,'numeroResidencia');
            $data_atendimento = filter_input(INPUT_POST,'dataAtendimento');
            $cpf =filter_input(INPUT_POST, 'cpf');
            $cep = filter_input(INPUT_POST,'cep');
            
            $celular = filter_input(INPUT_POST,'celular');
            $telefone = filter_input(INPUT_POST,'telefone');
            $email = filter_input(INPUT_POST,'email');
            
          

    $sqlUpdate = "update responsavel_familia set nome_responsavel='$nome', 
    data_nascimento_responsavel='$data_nascimento', 
    sexo_responsavel='$sexo',
    complemento_responsavel='$complemento',
    num_responsavel='$numero_residencia',
    cpf_responsavel='$cpf',
    data_atendimento_responsavel='$data_atendimento',
    cep_responsavel ='$cep'
    where id_responsavel='$id'";

    $sqlUpdate1 = "update contato set telefone='$telefone',
    celular='$celular',
    email='$email' where id_contato='$id'";

    
    $result = $con->query($sqlUpdate);
    $result1 = $con->query($sqlUpdate1);

    
    }
    header('location: ../../pages/responsavelFamilia/responsavelFamilia.php');

?>