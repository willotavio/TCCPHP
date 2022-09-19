<?php
$nome =  filter_input(INPUT_GET,'nome');
$dataNasc =  filter_input(INPUT_GET,'dataNasc');
$numRes = filter_input(INPUT_GET,'numRes');
$complemento =  filter_input(INPUT_GET,'complemento');
$sexoP= filter_input(INPUT_GET,'sexoP');
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
include 'responsavelF.php';

$responsavelF = new responsavelF();
$contato = new contato();

$contato->setTelefone($telefone);
$contato->setCelular($celular);
$contato->setEmail($email);

$responsavelF->setNomeF($nome);
$responsavelF->setdataNasc($dataNasc);
$responsavelF->setnumRes($numRes);
$responsavelF->setComplemento($complemento);
$responsavelF->setSexoF($sexoP);
$responsavelF->setcpf($cpf);
$responsavelF->setCep($cep);



include 'responsavelFDAO.php';
$responsavelFDao = new responsavelFDao();

if($botao=='Cadastrar'){
    $responsavelFDao->cadastrarresponsavelF($responsavelF, $contato);
  }
?>