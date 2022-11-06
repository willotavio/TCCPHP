<?php
session_start();
$idUsuario= $_SESSION['idUsuario'];

$tipo= filter_input(INPUT_POST,'tipo');
$descricao= filter_input(INPUT_POST,'descricao');
$valor= filter_input(INPUT_POST,'valor');
$dataCadastro = filter_input(INPUT_POST,'dataCadastro');
$button =  filter_input(INPUT_POST,'button');

    if($tipo == "Entrada"){
        $tipoBanco = "E";
    }else if ($tipo == "Saída"){
        $tipoBanco = "S";
    }else{
        echo "<script LANGUAGE= 'JavaScript'>
            window.alert('Erro valor do Tipo de Conta');
            window.location.href='../../pages/financeiro/financeiro.php';
            </script>";
    }

include 'financeiroDAO.php';
$financeiroDao = new financeiroDao();

$financeiroDao->setTipo($tipoBanco);
$financeiroDao->setDescricao($descricao);
$financeiroDao->setValor($valor);
$financeiroDao->setData($dataCadastro);
$financeiroDao->setUsuario($idUsuario);

if($button=='entrada' || $button=='saida'){
    $financeiroDao->cadastrarEntradaSaidaFinanceiro($financeiroDao);
    }else{
        echo "<script LANGUAGE= 'JavaScript'>
        window.alert('Erro no botão');
        window.location.href='../../pages/financeiro/financeiro.php';
        </script>";
    }
?>