<?php
$nome =  filter_input(INPUT_GET,'nome');
$dataNasc =  filter_input(INPUT_GET,'dataNasc');
$celular =  filter_input(INPUT_GET,'celular');
$telefone =  filter_input(INPUT_GET,'telefone');
$email =  filter_input(INPUT_GET,'email');
$numRes = filter_input(INPUT_GET,'numRes');
$complemento =  filter_input(INPUT_GET,'complemento');
$sexoP= filter_input(INPUT_GET,'sexoP');
$botao =  filter_input(INPUT_GET,'botao');
$cep = filter_input(INPUT_GET,'cep');
$rua = filter_input(INPUT_GET,'rua');
$bairro = filter_input(INPUT_GET,'bairro');
$estado = filter_input(INPUT_GET,'estado');
$cidade = filter_input(INPUT_GET,'cidade');
$cepPessoa = filter_input(INPUT_GET,'cep');
$contPessoa = "1";

include 'contato.php';
include 'pessoa.php';
include 'codigoEnderecoPostal.php';
$pes = new pessoa();
$codigoEnderecoPostal = new codigoEnderecoPostal();
$contato = new contato();


$codigoEnderecoPostal->setCep($cep);
$codigoEnderecoPostal->setRua($rua);
$codigoEnderecoPostal->setBairro($bairro);
$codigoEnderecoPostal->setEstado($estado);
$codigoEnderecoPostal->setCidade($cidade);
$contato->setTelefone($telefone);
$contato->setCelular($celular);
$contato->setEmail($email);
$pes->setNome($nome);
$pes->setdataNasc($dataNasc);
$pes->setnumRes($numRes);
$pes->setComplemento($complemento);
$pes->setSexoP($sexoP);
$pes->setCepessoa($cep);
session_start();




include 'pessoaDAO.php';
$pesDao = new pessoaDao();

if($botao=='Cadastrar'){
    $pesDao->cadastrarPessoa($pes, $codigoEnderecoPostal, $contato);
  }
?>