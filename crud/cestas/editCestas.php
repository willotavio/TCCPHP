<?php
    include_once('../../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();

    if(isset($_GET['update'])){

    $idCestas = filter_input(INPUT_GET,'idCestas1');
    $quantidadeCestas = filter_input(INPUT_GET,'quantidadeCestas1');
    $recebimentoCestas = filter_input(INPUT_GET,'recebimentoCestas1');
    $sqlUpdate = "update cestas set quantidade_cestas='$quantidadeCestas', recebimento_cestas='$recebimentoCestas' where idCestas='$idCestas'";
    $result = $con->query($sqlUpdate);
    }
    header('location: ../../pages/principal/cestas/cestas.php');

?>