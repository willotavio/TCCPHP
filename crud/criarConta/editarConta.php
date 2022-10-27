<?php
    include_once('../../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();

    if(isset($_POST['Atualizar'])){

            $id = filter_input(INPUT_POST,'id');
            $nome = filter_input(INPUT_POST,'nome');
            $email = filter_input(INPUT_POST,'email');
            
          

    $sqlUpdate = "update usuario set nome_usuario='$nome', 
    email_usuario='$email'
    where id_usuario='$id'";
    $result = $con->query($sqlUpdate);
 
   
    }
    header('location: ../../pages/conta/conta.php');

?>