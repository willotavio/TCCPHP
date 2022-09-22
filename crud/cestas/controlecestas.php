<?php
session_start();
$id= $_SESSION['id'];
$idCestas = filter_input(INPUT_GET,'idCestas');
$quantidadeCestas = filter_input(INPUT_GET,'quantidadeCestas');
$recebimentoCestas = filter_input(INPUT_GET,'recebimentoCestas');
$botao =  filter_input(INPUT_GET,'botao');

include 'cestasDAO.php';
$cesDao = new cestasDao();

$cesDao->setidCestas($idCestas);
$cesDao->setquantidadeCestas($quantidadeCestas);
$cesDao->setrecebimentoCestas($recebimentoCestas); 
$cesDao->setUsuarioU($id); 

if($botao=='Cadastrar'){
    $cesDao->cadastrarCesta($cesDao);
    }
?>