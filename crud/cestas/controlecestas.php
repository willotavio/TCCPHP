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
        include_once('../../connection/conexao.php');
        $banco = new conexao();
        $con = $banco->getConexao();
        $totalCestas = $con->query('SELECT quantidade_estoque FROM estoque where produto_estoque = "cestas"')->fetchColumn();
        $totalCestasSaida = $con->query("SELECT quantidade_entradaEstoque FROM entradaEstoque where id_entradaEstoque = $idCesta")->fetchColumn();

        if($totalCestasSaida <= $totalCestas){
            $cestaDao->deletarCesta($cestaDao);
        }else{
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Não é possível deletar esse Relátorio $quantidade');
                window.location.href='../../pages/cestas/relatorioCestas.php'
                </script>";
        }
        
    }
?>