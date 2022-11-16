<?php
session_start();
$idUsuario= $_SESSION['idUsuario'];
$quantidade= filter_input(INPUT_GET,'quantidadeCestas');
$dataEntrada = filter_input(INPUT_GET,'recebimentoCestas');
$botao =  filter_input(INPUT_GET,'botao');
$idCesta = filter_input(INPUT_GET,'idCesta');
$codigoProduto = 1;

include 'cestasDAO.php';
$cestaDao = new cestasDao();
$cestaDao->setQuantidade($quantidade);
$cestaDao->setDataEntrada($dataEntrada); 
$cestaDao->setUsuario($idUsuario); 
$cestaDao->setCodigoProduto($codigoProduto);
$cestaDao->setId($idCesta);


if($botao=='Cadastrar'){
    $cestaDao->cadastrarCesta($cestaDao);
    }else if ($botao=='Deletar'){
        $cestaDao->deletarCesta($cestaDao);
    }
?>