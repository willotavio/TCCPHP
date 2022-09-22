<?php

$idCestas = filter_input(INPUT_GET,'idCestas');
$quantidadeCestas = filter_input(INPUT_GET,'quantidadeCestas');
$dataCadastro = filter_input(INPUT_GET,'dataCadastro');
$botao =  filter_input(INPUT_GET,'botao');

       
        include_once 'cestasSDAO.php';
        $banco = new conexao();
        $con = $banco->getConexao();
        $contCMC = $con->query('SELECT SUM(quantidade_cestas) FROM cestas')->fetchColumn(); 
        $contCMD = $con->query('SELECT SUM(quantidade_cestasS) FROM saidaCestas')->fetchColumn();
        $total = $contCMC - $contCMD;
        
       
        $cesDao = new cestasDao();

        $cesDao->setidCestas($idCestas);
        $cesDao->setquantidadeCestas($quantidadeCestas);
        $cesDao->setcadastroCestas($dataCadastro); 
       


        if($botao=='cadastrarSaida'){
            if($total >= $quantidadeCestas){
                $cesDao->cadastrarCesta();
            }else{
                
                 echo "<script LANGUAGE= 'JavaScript'>
                window.alert('O estoque não possui cestas suficientes para realizar essa doação');
                window.location.href='../../../pages/principal/cestas/cestas.php';
                </script>";
            }
        }
        

?>