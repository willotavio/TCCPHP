<?php
    include_once('../../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();

    if(isset($_GET['update'])){

            $idFamilia = filter_input(INPUT_GET,'idFamilia');
            $nome_familia = filter_input(INPUT_GET,'nome');
            $data_nascimento_familia = filter_input(INPUT_GET,'dataNasc');
            $sexo_familia =filter_input(INPUT_GET,'sexo_familia');
            $complemento_familia = filter_input(INPUT_GET,'complemento');
            $n_familia = filter_input(INPUT_GET,'numRes');
            $data_atendimento = filter_input(INPUT_GET,'dataAtendimento');
            
            $celular = filter_input(INPUT_GET,'celular');
            $telefone = filter_input(INPUT_GET,'telefone');
            $email = filter_input(INPUT_GET,'email');
            
            $cep = filter_input(INPUT_GET,'cep');
            $rua = filter_input(INPUT_GET,'rua');
            $bairro = filter_input(INPUT_GET,'bairro');
            $estado = filter_input(INPUT_GET,'estado');
            $cidade = filter_input(INPUT_GET,'cidade');

    $sqlUpdate = "update familia set nome_familia='$nome_familia', 
    data_nascimento_familia='$data_nascimento_familia', 
    sexo_familia='$sexo_familia',
    complemento_familia='$complemento_familia',
    n_familia='$n_familia',
    data_atendimento='$data_atendimento'
    where idFamilia='$idFamilia'";
    $sqlUpdate1 = "update contato set telefone='$telefone',
    celular='$celular',
    email='$email' where idContato='$idFamilia'";
    $sqlUpdate2 = "update codigoEnderecoPostal set cep='$cep', 
    rua='$rua', bairro='$bairro', estado='$estado', cidade='$cidade'";
    $result = $con->query($sqlUpdate);
    $result1 = $con->query($sqlUpdate1);
    $result2 = $con->query($sqlUpdate2);
    
    }
    header('location: ../../pages/principal/indexfamilia.php');

?>