<?php
    if(!isset($_SESSION)){
        session_start();
    }
    
    unset($_SESSION['nomeUsuario']);
    unset($_SESSION['tipoUsuario']);
    session_destroy();
    header("location: ../../index.php");


?>