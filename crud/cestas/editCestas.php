<?php
    include_once('../../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();

    if(isset($_GET['update'])){

    $idCestas = filter_input(INPUT_GET,'idCestas');
    $quantidadeCestas = filter_input(INPUT_GET,'quantidadeCestas');
    $recebimentoCestas = filter_input(INPUT_GET,'recebimentoCestas');
    $sqlUpdate = "update cestas set quantidade_cestas='$quantidadeCestas', recebimento_cestas='$recebimentoCestas' where idCestas='$idCestas'";
    $result = $con->query($sqlUpdate);
    }
    header('location: ../../pages/principal/indexcestas.php');

?>