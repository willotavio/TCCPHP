<?php
$nome =  filter_input(INPUT_GET,'nome');
$dataNascimento =  filter_input(INPUT_GET,'dataNascimento');
$numeroResidencia = filter_input(INPUT_GET,'numeroResidencia');
$complemento =  filter_input(INPUT_GET,'complemento');
$sexo = filter_input(INPUT_GET,'sexo');
$botao =  filter_input(INPUT_GET,'botao');
$cpf =  filter_input(INPUT_GET,'cpf');

$cep = filter_input(INPUT_GET,'cep');
$rua = filter_input(INPUT_GET,'rua');
$bairro = filter_input(INPUT_GET,'bairro');
$estado = filter_input(INPUT_GET,'estado');
$cidade = filter_input(INPUT_GET,'cidade');

$celular =  filter_input(INPUT_GET,'celular');
$telefone =  filter_input(INPUT_GET,'telefone');
$email =  filter_input(INPUT_GET,'email');


include 'contato.php';
include 'responsavelFamilia.php';

$responsavel = new responsavelFamilia();
$contato = new contato();

$contato->setTelefone($telefone);
$contato->setCelular($celular);
$contato->setEmail($email);

$responsavel->setNome($nome);
$responsavel->setDataNascimento($dataNascimento);
$responsavel->setNumeroResidencia($numeroResidencia);
$responsavel->setComplemento($complemento);
$responsavel->setSexo($sexo);
$responsavel->setCpf($cpf);
$responsavel->setCep($cep);


include 'responsavelFamiliaDAO.php';
$responsavelDao = new responsavelFamiliaDao();

if($botao=='Cadastrar'){
    $responsavelDao->cadastrarResponsavelFamilia($responsavel, $contato);
  }
?>