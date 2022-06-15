<?php
session_start();

if ($_SESSION['login']!='' or $_SESSION['login']!=null){
        include '../crud/pessoa.php';
        include '../crud/pessoaDAO.php';
        header('location:../pages/home.php');
}else{
        echo ("<script LANGUAGE='javaScript'>
        window.alert('Dados Incorretos!');
        window.location.href='../indexlogin.php';
        </script>");
}
?>