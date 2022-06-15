<?php
session_start();

if ($_SESSION['login']!='' or $_SESSION['login']!=null){
        include 'pessoa.php';
        include 'pessoaDAO.php';
        header('location:home.php');
}else{
        echo ("<script LANGUAGE='javaScript'>
        window.alert('Dados Incorretos!');
        window.location.href='indexlogin.php';
        </script>");
}
?>