<?php

 if(!empty($_GET['idCestas1'])){
        include_once('../../connection/conexao.php');
        $banco = new conexao();
        $con = $banco->getConexao();

        $id = $_GET['idCestas1'];
        $sqlSelect = "SELECT * FROM cestas WHERE id_cestas =$id";
        $result = $con->query($sqlSelect);
        
        if($result->rowCount() > 0){
            $sqlDelete = "DELETE FROM cestas WHERE id_cestas=$id";
            $resultDelete = $con->query($sqlDelete);
        }
    } header('location: ../../pages/principal/cestas/cestas.php');

?>