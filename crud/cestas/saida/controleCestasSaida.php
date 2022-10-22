<?php
session_start();
$nomeUsuario= $_SESSION['nomeUsuario'];
$quantidade = filter_input(INPUT_GET,'quantidade');
$dataSaida = filter_input(INPUT_GET,'dataSaida');
$botao =  filter_input(INPUT_GET,'botao');
$codigoProduto = 1;

    include_once 'cestasSaidaDAO.php';
    $banco = new conexao();
    $con = $banco->getConexao();
    $totalCestas = $con->query('SELECT quantidade_estoque FROM estoque where produto_estoque = "cestas"')->fetchColumn(); 
    $cestasSaidaDao = new cestasSaidaDao();

    $cestasSaidaDao->setQuantidade($quantidade);
    $cestasSaidaDao->setDataSaida($dataSaida);
    $cestasSaidaDao->setUsuario($nomeUsuario); 
    $cestasSaidaDao->setCodigoProduto($codigoProduto);

    if($botao=='cadastrarSaida'){
        if($totalCestas >= $quantidade){
            $cestasSaidaDao ->cadastrarSaidaCesta();
        }else{
            
            echo "<script LANGUAGE= 'JavaScript'>
            window.alert('O estoque não possui cestas suficientes para realizar essa doação');
            window.location.href='../../../pages/cestas/cestas.php';
            </script>";
        }
    }
    

?>