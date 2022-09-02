<?php

 if(!empty($_GET['idCestas'])){
        include_once('../../connection/conexao.php');
        $banco = new conexao();
        $con = $banco->getConexao();

        $id = $_GET['idCestas'];
        $sqlSelect = "SELECT * FROM cestas WHERE idCestas =$id";
        $result = $con->query($sqlSelect);
        
        if($result->rowCount() > 0){
            $sqlDelete = "DELETE FROM cestas WHERE idCestas=$id";
            $resultDelete = $con->query($sqlDelete);
        }
    } header('location: ../../pages/principal/cestas/cestas.php');

?>