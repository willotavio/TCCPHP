<?php

 if(!empty($_GET['idCestas'])){
        include_once('../../connection/testeconexao.php');

        $id = $_GET['idCestas'];
        $sqlSelect = "SELECT * FROM cestas WHERE idCestas =$id";
        $result = $conexaoTeste->query($sqlSelect);

        if($result->num_rows > 0){
            $sqlDelete = "DELETE FROM cestas WHERE idCestas=$id";
            $resultDelete = $conexaoTeste->query($sqlDelete);
        }
    } header('location: ../../pages/principal/indexcestas.php');

?>