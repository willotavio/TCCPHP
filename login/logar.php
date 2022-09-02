<?php
session_start();

if(isset($_POST['submit']) && !empty($_POST['nome_login']) && !empty($_POST['senha']))
{
    include '../connection/conexao.php';

    $nome_login = filter_input(INPUT_POST, 'nome_login');
    $senha = filter_input(INPUT_POST, 'senha');
    $sqlquery = "select * from usuario where nome_login= '$nome_login' and senha = '$senha'";
    $conexao = new Conexao(); 
    $con = $conexao->getConexao();
    $result = $con->query($sqlquery);

    if($result->rowCount() < 1){
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        echo ("<script LANGUAGE='javaScript'>
        window.alert('Dados Incorretos!');
        window.location.href='../index.php';
        </script>");
    }else{
        $_SESSION['usuario'] = $nome_login;
        $_SESSION['senha'] = $senha ;
        
        header('location: ../pages/principal/home.php');
    }
    
}else{
    echo ("<script LANGUAGE='javaScript'>
    window.alert('Os dados inseridos estão Incoretos');
    window.location.href='../index.php';
    </script>");
}
?>