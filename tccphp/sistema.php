<?php
session_start();

if ($_SESSION['login']=='' or $_SESSION['login']==null){
   echo ("<script LANGUAGE='javaScript'>
        window.alert('Dados incorretos');
        window.location.href='indexlogin.php';
        </script>");
}else{
    include 'pessoa.php';
include 'pessoaDAO.php';

        header('location:home.php');
    
}
?>