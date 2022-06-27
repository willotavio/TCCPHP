<?php

include '../crud/pessoa/pessoa.php';
include '../crud/pessoa/pessoaDAO.php';

session_start();
$login = filter_input(INPUT_POST, 'login');
$senha = filter_input(INPUT_POST, 'senha');

$pessoa = new pessoa();
$pessoa->setLogin($login);
$pessoa->setSenha($senha);

$pessoaDAO = new pessoaDAO();
$pessoaDAO->consultalogin($pessoa);

foreach($pessoaDAO->consultalogin($pessoa) as $resultado){
    $_SESSION['login'] = $resultado['login'];
    header('location:sistema.php');
}
?>