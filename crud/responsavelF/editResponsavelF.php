<?php
    include_once('../../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();

    if(isset($_GET['update'])){

            $idResponsavel = filter_input(INPUT_GET,'idResponsavel');
            $nome_responsavel = filter_input(INPUT_GET,'nome');
            $data_nascimento_responsavel = filter_input(INPUT_GET,'dataNasc');
            $sexo_responsavel =filter_input(INPUT_GET,'sexo_responsavel');
            $complemento_responsavel = filter_input(INPUT_GET,'complemento');
            $n_responsavel = filter_input(INPUT_GET,'numRes');
            $data_atendimento = filter_input(INPUT_GET,'dataAtendimento');
            $cpf =filter_input(INPUT_GET, 'cpf');
            
            $celular = filter_input(INPUT_GET,'celular');
            $telefone = filter_input(INPUT_GET,'telefone');
            $email = filter_input(INPUT_GET,'email');
            
            $cep = filter_input(INPUT_GET,'cep');
            $rua = filter_input(INPUT_GET,'rua');
            $bairro = filter_input(INPUT_GET,'bairro');
            $estado = filter_input(INPUT_GET,'estado');
            $cidade = filter_input(INPUT_GET,'cidade');

    $sqlUpdate = "update responsavel_familia set nome_responsavel='$nome_responsavel', 
    data_nascimento_responsavel='$data_nascimento_responsavel', 
    sexo_responsavel='$sexo_responsavel',
    complemento_responsavel='$complemento_responsavel',
    num_responsavel='$n_responsavel',
    cpf_responsavel='$cpf',
    data_atendimento_responsavel='$data_atendimento'
    where id_responsavel='$idResponsavel'";

    $sqlUpdate1 = "update contato set telefone='$telefone',
    celular='$celular',
    email='$email' where id_contato='$idResponsavel'";

    $sqlUpdate2 = "update endereco_postal set cep='$cep', 
    rua='$rua', bairro='$bairro', estado='$estado', cidade='$cidade' where id_cep='$idResponsavel'";
    
    $result = $con->query($sqlUpdate);
    $result1 = $con->query($sqlUpdate1);
    $result2 = $con->query($sqlUpdate2);
    
    }
    header('location: ../../pages/principal/responsavelFamilia/responsavelFamilia.php');

?>