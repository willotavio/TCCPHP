<?php

include 'pessoa.php';
include 'pessoaDAO.php';

session_start();
$usuario = filter_input(INPUT_POST, 'usuario');
$senha = filter_input(INPUT_POST, 'senha');

$pessoa = new pessoa();
$pessoa->setUsuario($usuario);
$pessoa->setSenha($senha);

$pessoaDAO = new pessoaDAO();
$pessoaDAO->consultalogin($pessoa);

    header('location:sistema.php');

?>