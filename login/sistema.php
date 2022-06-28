<?php
session_start();

if ($_SESSION['login']!='' or $_SESSION['login']!=null){
        include '../../crud/pessoa/pessoa.php';
        include '../../crud/pessoa/pessoaDAO.php';
        header('location:../pages/principal/home.php');
}else{
        
}
?>