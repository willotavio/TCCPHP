<?php
$idCestas = filter_input(INPUT_GET,'idCestas');
$quantidadeCestas = filter_input(INPUT_GET,'quantidadeCestas');
$recebimentoCestas = filter_input(INPUT_GET,'recebimentoCestas');
$botao =  filter_input(INPUT_GET,'botao');

include 'cestas.php';
$ces = new cestas();

$ces->setidCestas($idCestas);
$ces->setquantidadeCestas($quantidadeCestas);
$ces->setrecebimentoCestas($recebimentoCestas); 

include 'cestasDAO.php';
$cesDao = new cestasDao();

if($botao=='Cadastrar'){
    $cesDao->cadastrarCesta($ces);
    }
?>