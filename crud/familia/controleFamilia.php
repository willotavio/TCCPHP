<?php
$nome =  filter_input(INPUT_GET,'nome');
$dataNasc =  filter_input(INPUT_GET,'dataNasc');
$numRes = filter_input(INPUT_GET,'numRes');
$complemento =  filter_input(INPUT_GET,'complemento');
$sexoP= filter_input(INPUT_GET,'sexoP');
$botao =  filter_input(INPUT_GET,'botao');

$cep = filter_input(INPUT_GET,'cep');
$rua = filter_input(INPUT_GET,'rua');
$bairro = filter_input(INPUT_GET,'bairro');
$estado = filter_input(INPUT_GET,'estado');
$cidade = filter_input(INPUT_GET,'cidade');

$celular =  filter_input(INPUT_GET,'celular');
$telefone =  filter_input(INPUT_GET,'telefone');
$email =  filter_input(INPUT_GET,'email');


include 'contato.php';
include 'familia.php';
include 'codigoEnderecoPostal.php';
$familia = new familia();
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

$familia->setNomeF($nome);
$familia->setdataNasc($dataNasc);
$familia->setnumRes($numRes);
$familia->setComplemento($complemento);
$familia->setSexoF($sexoP);



include 'familiaDAO.php';
$familiaDao = new familiaDao();

if($botao=='Cadastrar'){
    $familiaDao->cadastrarFamilia($familia, $contato, $codigoEnderecoPostal);
  }
?>