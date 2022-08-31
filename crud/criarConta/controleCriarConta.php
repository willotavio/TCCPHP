<?php
$cadastrarULogin = filter_input(INPUT_GET,'cadastrarULogin');
$cadastrarUSenha = filter_input(INPUT_GET,'cadastrarUSenha');
$cadastrarUCSenha = filter_input(INPUT_GET,'cadastrarUCSenha');
$cadastrarUEmail = filter_input(INPUT_GET,'cadastrarUEmail');
$botao =  filter_input(INPUT_GET,'botao');
$cadastrarUTipo = filter_input(INPUT_GET,'cadastrarUTipo');

include 'contaCriar.php';
$contaC = new criarConta();



$contaC->setULogin($cadastrarULogin);
$contaC->setUsenha($cadastrarUSenha);
$contaC->setUEmail($cadastrarUEmail); 
$contaC->setUCSSenha($cadastrarUCSenha);
$contaC->setUTipo($cadastrarUTipo);
$contaC->setUCSSenha($cadastrarUCSenha); 



include 'contaCriarDAO.php';
$contaCDao = new contaCDao();
if($botao=='cadastrar'){
    if($cadastrarUSenha == $cadastrarUCSenha){
        $contaCDao->cadastrarNvC($contaC);
    }else{
        echo "<script LANGUAGE= 'JavaScript'>
            window.alert('As senhas digitadas não indênticas tente novamente');
            window.location.href='../../pages/login/criarConta.php';
            </script>"; 
    }
    }
?>