<?php

    include_once('../../connection/testeconexao.php');

    if(isset($_GET['update'])){

    $idCestas = filter_input(INPUT_GET,'idCestas');
    $quantidadeCestas = filter_input(INPUT_GET,'quantidadeCestas');
    $recebimentoCestas = filter_input(INPUT_GET,'recebimentoCestas');
    $sqlUpdate = "update cestas set quantidade_cestas='$quantidadeCestas', recebimento_cestas='$recebimentoCestas' where idCestas='$idCestas'";
    $result = $conexaoTeste->query($sqlUpdate);
    }
    header('location: ../../pages/principal/indexcestas.php');

?>