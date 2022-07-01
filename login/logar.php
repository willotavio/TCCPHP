<?php

include '../crud/pessoa/pessoa.php';
include '../crud/pessoa/pessoaDAO.php';

session_start();
$nome_login = filter_input(INPUT_POST, 'nome_login');
$senha = filter_input(INPUT_POST, 'senha');

$pessoa = new pessoa();
$pessoa->setNome_Login($nome_login);
$pessoa->setSenha($senha);

$pessoaDAO = new pessoaDAO();
$pessoaDAO->consultalogin($pessoa);

foreach($pessoaDAO->consultalogin($pessoa) as $resultado){
    $_SESSION['nome_login'] = $resultado['nome_login'];
    header('location:sistema.php');
}
?>