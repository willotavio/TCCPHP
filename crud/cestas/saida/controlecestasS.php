<?php
    session_start();
         $id= $_SESSION['id'];
    

$idCestas = filter_input(INPUT_GET,'idCestas');
$quantidadeCestas = filter_input(INPUT_GET,'quantidadeCestas');
$dataCadastro = filter_input(INPUT_GET,'dataCadastro');
$botao =  filter_input(INPUT_GET,'botao');

include 'cestasSDAO.php';
$cesDao = new cestasDao();


$cesDao->setidCestas($idCestas);
$cesDao->setquantidadeCestas($quantidadeCestas);
$cesDao->setcadastroCestas($dataCadastro); 
$cesDao->setUsuario($id); 


if($botao=='cadastrarSaida'){
    $cesDao->cadastrarCesta();
    }
?>