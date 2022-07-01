<?php
session_start();

if ($_SESSION['nome_login']!='' or $_SESSION['nome_login']!=null){
        include '../../crud/pessoa/pessoa.php';
        include '../../crud/pessoa/pessoaDAO.php';
        header('location:../pages/principal/home.php');
}else{
        echo ("<script LANGUAGE='javaScript'>
        window.alert('Dados Incorretos!');
        window.location.href='../indexlogin.php';
        </script>");
}
?>