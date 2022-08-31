<?php
$idCestas = filter_input(INPUT_GET,'idCestas');
$quantidadeCestas = filter_input(INPUT_GET,'quantidadeCestas');
$recebimentoCestas = filter_input(INPUT_GET,'recebimentoCestas');
$botao =  filter_input(INPUT_GET,'botao');

include 'cestasDAO.php';
$cesDao = new cestasDao();

$cesDao->setidCestas($idCestas);
$cesDao->setquantidadeCestas($quantidadeCestas);
$cesDao->setrecebimentoCestas($recebimentoCestas); 

if($botao=='Cadastrar'){
    $cesDao->cadastrarCesta($cesDao);
    }
?>