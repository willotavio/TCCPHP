<?php
    include_once('../../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();

    if(isset($_POST['update'])){

            $idResponsavel = filter_input(INPUT_POST,'id');
            $nome_responsavel = filter_input(INPUT_POST,'nome');
            $data_nascimento_responsavel = filter_input(INPUT_POST,'dataNasc');
            $sexo_responsavel =filter_input(INPUT_POST,'sexoP');
            $complemento_responsavel = filter_input(INPUT_POST,'complemento');
            $n_responsavel = filter_input(INPUT_POST,'numRes');
            $data_atendimento = filter_input(INPUT_POST,'atendimento');
            $cpf =filter_input(INPUT_POST, 'cpf');
            $cep = filter_input(INPUT_POST,'cep1');
            
            $celular = filter_input(INPUT_POST,'celular');
            $telefone = filter_input(INPUT_POST,'telefone');
            $email = filter_input(INPUT_POST,'email');
            
          

    $sqlUpdate = "update responsavel_familia set nome_responsavel='$nome_responsavel', 
    data_nascimento_responsavel='$data_nascimento_responsavel', 
    sexo_responsavel='$sexo_responsavel',
    complemento_responsavel='$complemento_responsavel',
    num_responsavel='$n_responsavel',
    cpf_responsavel='$cpf',
    data_atendimento_responsavel='$data_atendimento',
    cep_responsavel ='$cep'
    where id_responsavel='$idResponsavel'";

    $sqlUpdate1 = "update contato set telefone='$telefone',
    celular='$celular',
    email='$email' where id_contato='$idResponsavel'";

    
    $result = $con->query($sqlUpdate);
    $result1 = $con->query($sqlUpdate1);

    
    }
    header('location: ../../pages/principal/responsavelFamilia/responsavelFamilia.php');

?>