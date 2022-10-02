<?php

 if(!empty($_GET['idFuncionario'])){
        include_once('../../connection/conexao.php');
        $banco = new conexao();
        $con = $banco->getConexao();
        $id = $_GET['idFuncionario'];
        $sqlSelect = "SELECT * FROM usuario WHERE id_usuario =$id";
        $result = $con->query($sqlSelect);

        if($result->rowCount() > 0){
            $sqlDelete = "DELETE FROM usuario WHERE id_usuario=$id";
            $resultDelete = $con->query($sqlDelete);
        }
    }header('location: ../../pages/funcionarios/funcionarios.php');

?>