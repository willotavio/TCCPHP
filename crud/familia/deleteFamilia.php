<?php

 if(!empty($_GET['idFamilia'])){
        include_once('../../connection/conexao.php');
        $banco = new conexao();
        $con = $banco->getConexao();
        $id = $_GET['idFamilia'];
        $sqlSelect = "SELECT * FROM familia WHERE idFamilia =$id";
        $result = $con->query($sqlSelect);

        if($result->rowCount() > 0){
            $sqlDelete = "DELETE FROM familia WHERE idFamilia=$id";
            $sqlDelete2 = "DELETE FROM codigoEnderecoPostal WHERE idCep=$id";
            $sqlDelete3 = "DELETE FROM contato WHERE idContato=$id";
            $resultDelete = $con->query($sqlDelete);
            $resultDelete2 = $con->query($sqlDelete2);
            $resultDelete3 = $con->query($sqlDelete3);
        }
    }header('location: ../../pages/principal/indexFamilia.php');

?>