<?php
$codigo = filter_input(INPUT_GET,'codigo');
$nome =  filter_input(INPUT_GET,'nome');
$dataNasc =  filter_input(INPUT_GET,'dataNasc');
$celular =  filter_input(INPUT_GET,'celular');
$whatsapp = filter_input(INPUT_GET,'whatsapp');
$telefone =  filter_input(INPUT_GET,'telefone');
$email =  filter_input(INPUT_GET,'email');
$cepPessoa =  filter_input(INPUT_GET,'cepPessoa');
$numRes = filter_input(INPUT_GET,'numRes');
$complemento =  filter_input(INPUT_GET,'complemento');
$dataAtendimento =  filter_input(INPUT_GET,'dataAtendimento');
$botao =  filter_input(INPUT_GET,'botao');

include 'pessoa.php';
$pes = new pessoa();

$pes->setCodigo($codigo);
$pes->setNome($nome);
$pes->setdataNasc($dataNasc);
$pes->setCelular($celular);
$pes->setWhatsapp($whatsapp);
$pes->setTelefone($telefone);
$pes->setEmail($email);
$pes->setcepPessoa($cepPessoa);
$pes->setnumRes($numRes);
$pes->setComplemento($complemento);
$pes->setdataAtendimento($dataAtendimento);

include 'pessoaDAO.php';
$pesDao = new pessoaDao();

if($botao=='Cadastrar'){
    $pesDao->cadastrarPessoa($pes);
  }else if ($botao=='Atualizar'){
      $pesDao->atualizarPessoa($pes);
    }else if ($botao=='Deletar'){
      $pesDao->deletarPessoa($codigo);
    }
?>