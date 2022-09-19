<?php

 if(!empty($_GET['idResponsavel1'])){
        include_once('../../connection/conexao.php');
        $banco = new conexao();
        $con = $banco->getConexao();
        $id = $_GET['idResponsavel1'];
        $sqlSelect = "SELECT * FROM responsavel_familia WHERE id_responsavel =$id";
        $result = $con->query($sqlSelect);

        if($result->rowCount() > 0){
            $sqlDelete = "DELETE FROM responsavel_familia WHERE id_responsavel=$id";
            $sqlDelete3 = "DELETE FROM contato WHERE id_contato=$id";
            $resultDelete = $con->query($sqlDelete);
            $resultDelete3 = $con->query($sqlDelete3);
        }
    }header('location: ../../pages/principal/responsavelFamilia/responsavelFamilia.php');

?>