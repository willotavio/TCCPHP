<?php
$nomeUsuario =  $_POST['nomeUsuario'];
$senhaUsuario = sha1($_POST['senhaUsuario']);
if ($nomeUsuario == null && $senhaUsuario == null) {
    echo 3;
}else{
    include_once('../../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();

    $pesquisaUsuario = "SELECT id_usuario, tipo_usuario FROM usuario WHERE nome_usuario = '$nomeUsuario' AND senha_usuario = '$senhaUsuario'";
    $result= $con->query($pesquisaUsuario);
    if ($result->rowCount() > 0) {
        
        while ($row = $result->fetch()) {
            $idUsuario = $row['id_usuario'];
            $tipoUsuario = $row['tipo_usuario'];
        }
        
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['tipoUsuario'] = $tipoUsuario ;
        $_SESSION['idUsuario'] = $idUsuario ;
        $_SESSION['nomeUsuario'] = $nomeUsuario;
        echo 1;

    }else{
        echo 0; 
    }
}

?>