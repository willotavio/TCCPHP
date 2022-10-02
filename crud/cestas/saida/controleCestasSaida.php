<?php
session_start();
$idUsuario = $_SESSION['idUsuario'];
$quantidade = filter_input(INPUT_GET,'quantidade');
$dataSaida = filter_input(INPUT_GET,'dataSaida');
$botao =  filter_input(INPUT_GET,'botao');

    include_once 'cestasSaidaDAO.php';
    $banco = new conexao();
    $con = $banco->getConexao();
    $totalCestasEntradaBanco = $con->query('SELECT SUM(quantidade_cestas) FROM cestas')->fetchColumn(); 
    $totalCestasSaidaBanco = $con->query('SELECT SUM(quantidade_saidaCestas) FROM saidaCestas')->fetchColumn();
    $total = $totalCestasEntradaBanco - $totalCestasSaidaBanco;
    $cestasSaidaDao = new cestasSaidaDao();

    $cestasSaidaDao->setQuantidade($quantidade);
    $cestasSaidaDao->setDataSaida($dataSaida);
    $cestasSaidaDao->setUsuario($idUsuario); 

    if($botao=='cadastrarSaida'){
        if($total >= $quantidade){
            $cestasSaidaDao ->cadastrarSaidaCesta();
        }else{
            
            echo "<script LANGUAGE= 'JavaScript'>
            window.alert('O estoque não possui cestas suficientes para realizar essa doação');
            window.location.href='../../../pages/cestas/cestas.php';
            </script>";
        }
    }
    

?>