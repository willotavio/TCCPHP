<?php
if(isset($_POST["user_id"])){
    include_once('../../../connection/conexao.php');
    $user_id=$_POST["user_id"];
    $banco = new conexao();
    $con = $banco->getConexao();
    $sql = "SELECT * from responsavel_familia where id_responsavel=$user_id";
    $result = $con->query($sql);
    $response=array();
    while( $row = $result->fetch()){
        $response=$row; 
    }
    echo json_encode($response);
   
  
}