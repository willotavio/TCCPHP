<?php
session_start();

if ($_SESSION['usuario']=='' or $_SESSION['usuario']==null){
   echo ("<script LANGUAGE='javaScript'>
        window.alert('Dados incorretos');
        window.location.href='indexlogin.php';
        </script>");
}else{
    include 'pessoa.php';
include 'pessoaDAO.php';
    $pessoa = new pessoa();
    $pessoa->setUsuario($_SESSION['usuario']);

        header('location:home.php');
    
}
?>