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
            
            $celular = filter_input(INPUT_GET,'celular');
            $telefone = filter_input(INPUT_GET,'telefone');
            $email = filter_input(INPUT_GET,'email');
            
            $cep = filter_input(INPUT_GET,'cep');
            $rua = filter_input(INPUT_GET,'rua');
            $bairro = filter_input(INPUT_GET,'bairro');
            $estado = filter_input(INPUT_GET,'estado');
            $cidade = filter_input(INPUT_GET,'cidade');

    $sqlUpdate = "update responsavelfamilia set nome_responsavel='$nome_responsavel', 
    data_nascimento_responsavel='$data_nascimento_responsavel', 
    sexo_responsavel='$sexo_responsavel',
    complemento_responsavel='$complemento_responsavel',
    n_responsavel='$n_responsavel',
    data_atendimento='$data_atendimento'
    where idResponsavel='$idResponsavel'";

    $sqlUpdate1 = "update contato set telefone='$telefone',
    celular='$celular',
    email='$email' where idContato='$idResponsavel'";

    $sqlUpdate2 = "update codigoEnderecoPostal set cep='$cep', 
    rua='$rua', bairro='$bairro', estado='$estado', cidade='$cidade' where idCep='$idResponsavel'";
    
    $result = $con->query($sqlUpdate);
    $result1 = $con->query($sqlUpdate1);
    $result2 = $con->query($sqlUpdate2);
    
    }
    header('location: ../../pages/principal/responsavelFamilia/responsavelFamilia.php');

?>