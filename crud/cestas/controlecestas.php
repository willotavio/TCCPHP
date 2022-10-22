<?php
session_start();
$nomeUsuario= $_SESSION['nomeUsuario'];
$quantidade= filter_input(INPUT_GET,'quantidadeCestas');
$recebimento = filter_input(INPUT_GET,'recebimentoCestas');
$botao =  filter_input(INPUT_GET,'botao');
$codigoProduto = 1;

include 'cestasDAO.php';
$cestaDao = new cestasDao();

$cestaDao->setQuantidade($quantidade);
$cestaDao->setRecebimento($recebimento); 
$cestaDao->setUsuario($nomeUsuario); 
$cestaDao->setCodigoProduto($codigoProduto);

if($botao=='Cadastrar'){
    $cestaDao->cadastrarCesta($cestaDao);
    }
?>